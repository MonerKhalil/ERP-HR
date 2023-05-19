<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Models\DataEndService;
use App\Models\Decision;
use App\Models\Employee;
use App\Models\User;
use App\Notifications\MainNotification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RequestEndServiceController extends Controller
{
    public function __construct()
    {
        $table = "request_end_services";
        $this->middleware(["permission:all_".$table])->only(["allRequest"]);
        $this->middleware(["permission:create_".$table."|all_".$table])->only(["create","store"]);
        $this->middleware(["permission:all_".$table])->only(["accept","cancelMultiRequest"]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     * @author moner khalil
     */
    public function allRequest(){
        $DataEnd = DataEndService::query()->where("is_request_end_services",true);
        $data = MyApp::Classes()->Search->getDataFilter($DataEnd);
        return $this->responseSuccess("",compact("data"));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     * @throws AuthorizationException
     * @throws MainException
     * @author moner khalil
     */
    public function showMyRequest($employee = null){
        $userCurrent = auth()->user();
        if (!is_null($employee)){
            if (!$userCurrent->can("all_request_end_services")){
                throw new AuthorizationException(__("err_permission"));
            }
        }
        $employee = !is_null($employee) ? Employee::query()->findOrFail($employee) : auth()->user()->employee;
        if (is_null($employee)){
            throw new MainException("the user is not Employee...");
        }
        $DataEnd = DataEndService::query()->where("employee_id",$employee->id)
            ->where("is_request_end_services",true);
        $data = MyApp::Classes()->Search->getDataFilter($DataEnd);
        return $this->responseSuccess("",compact("data"));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     * @author moner khalil
     */
    public function create(){
        $reason = "resignation";
        return $this->responseSuccess("",compact("reason"));
    }

    /**
     * @param Request $request
     * @author moner khalil
     */
    public function store(Request $request){
        $request->validate([
            "description" => ["required","string"],
            "reason" => ["required","string",Rule::in(["resignation"])]
        ]);
        $user = auth()->user()->employee;
        if (is_null($user)){
            throw new MainException("the user is not Employee...");
        }
        $requestEnd = DataEndService::create([
            "description" => $request->description,
            "reason" => $request->reason,
            "employee_id" => $user->employee->id,
            "is_request_end_services" => true,
            "is_active" => false,
        ]);
        $users = User::query()->get();
        foreach ($users as $user) {
            if ($user->can("all_request_end_services"))
                $user->notify(new MainNotification([
                    "from" => $user->name,
                    "date" => now(),
                    "route_name" => [
                        "show" => route("system.request_end_services.show.request",$requestEnd->id),
                        "index" => route("system.request_end_services.index"),
                    ],
                ],"request_end_services"));
        }
        return $this->responseSuccess(null,null,"create","show.my.request");
    }

    public function showRequest($request){
        $decision = Decision::query()->pluck("content","id")->toArray();
        $request = DataEndService::query()->findOrFail($request);
        if (!$request->canShow()){
            throw new AuthorizationException(__("err_permission"));
        }
        return $this->responseSuccess("...",compact("request","decision"));
    }

    public function accept(BaseRequest $request,$id_request){
        $request->validate([
            "decision_id" => ["required",Rule::exists("decisions","id")],
            "start_break_date" => $request->date(true),
            "end_break_date" => $request->afterDateOrNowRules(true,"start_break_date"),
        ]);
        $id_request = DataEndService::query()->findOrFail($id_request);
        $id_request->update([
                "decision_id" => $request->decision_id,
                "start_break_date" => $request->start_break_date,
                "end_break_date" => $request->end_break_date,
                "is_active" => true,
        ]);
        return $this->responseSuccess(null,null,"default",null,true);
    }

    public function cancelMultiRequest(Request $request){
        $request->validate([
            "ids" => ["required","array"],
            "ids.*" => ["required",Rule::exists("data_end_services","id")],
        ]);
        DataEndService::query()->whereIn("id",$request->ids)
            ->where("is_request_end_services",true)->delete();
        return $this->responseSuccess(null,null,"delete",null,true);
    }
}
