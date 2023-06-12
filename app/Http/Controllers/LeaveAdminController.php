<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\LeaveAdminRequest;
use App\Http\Requests\LeaveRequest;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\User;
use App\Notifications\MainNotification;
use App\Services\LeavesProcessService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class LeaveAdminController extends Controller
{
    public const NameBlade = "";
    public const IndexRoute = "system.leaves_admin.index";

    public function __construct()
    {
        $table = app(Leave::class)->getTable();
        $this->addMiddlewarePermissionsToFunctions($table);
        $this->middleware(["permission:update_".$table."|all_".$table])->only(["changeStatus"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Leave::with(["leave_type","employee"]);
        $status = Leave::status();
        //search name employee
        if (isset($request->filter["name_employee"]) && !is_null($request->filter["name_employee"])){
            $data = $data->whereHas("employee",function ($q) use ($request){
                $q->where("first_name","Like","%".$request->filter["name_employee"]."&")
                    ->orWhere("last_name","Like","%".$request->filter["name_employee"]."&");
            });
        }
        //search select leave type..
        $leave_types = LeaveType::query()->pluck("name","id")->toArray();
        return $this->responseSuccess(self::NameBlade,compact("data","status","leave_types"));
    }

    /**
     * @param Request $request
     * @param Leave $leave
     * @param $status
     * @author moner khalil
     */
    public function changeStatus(Request $request, Leave $leave, $status){
        $request->validate([
            "reject_details" => ["nullable","string"],
        ]);
        $leave->update([
            "status" => $status,
            "reject_details" => $request->reject_details,
            "date_update_status" => now(),
        ]);
        $message = $status == "approve" ? __("accept_request_leave") : __("cancel_request_leave");
        $user = User::query()->find($leave->employee->user_id);
        $user->notify(new MainNotification([
            "from" => auth()->user()->name,
            "body" => $message,
            "date" => now(),
            "route_name" => route("system.leaves.show",$leave->id),
        ],__("request_leave")));
        return $this->responseSuccess(null,null,"default",self::IndexRoute);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leave_types = LeaveType::query()->pluck("name","id")->toArray();
        $employees = Employee::query()->pluck("name","id")->toArray();
        return $this->responseSuccess("...",compact("employees","leave_types"));
    }


    /**
     * @param LeaveRequest $request
     * @param LeavesProcessService $service
     * @throws MainException
     * @author moner khalil
     */
    public function store(LeaveAdminRequest $request, LeavesProcessService $service)
    {
        try {
            DB::beginTransaction();
            $employees = Employee::with("section")->whereIn("id",$request->employee_ids)->get();
            $leave_type = LeaveType::query()->find($request->leave_type_id);
            foreach ($employees as $employee){
                if ($service->checkAllProcess($request,$employee,$leave_type)){
                    $data = [
                        "employee_id" => $employee->id,
                        "leave_type_id" => $leave_type->id,
                        "from_date" => $request->from_date,
                        "to_date" => $request->to_date,
                    ];
                    if (!is_null($request->count_hours)){
                        $data["count_hours"] = $request->count_hours;
                    }
                    if (!is_null($request->minutes)){
                        $data["minutes"] = $request->minutes;
                    }
                    $from = Carbon::parse($request->from_date)->format("Y-m-d");
                    $to = Carbon::parse($request->to_date)->format("Y-m-d");
                    $data["count_days"] = Carbon::createFromFormat("Y-m-d",$to)->diffInDays($from);
                    $data["status"] = "approve";
                    $data["description"] = $request->description;
                    Leave::create($data);
                }
            }
            DB::commit();
            return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        $leave = Leave::with(["leave_type","employee"])->find($leave);
        return $this->responseSuccess("...",compact("leave"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        $leave = Leave::with(["leave_type","employee"])->find($leave);
        $leave_types = LeaveType::query()->pluck("name","id")->toArray();
        return $this->responseSuccess("...",compact("leave","leave_types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveAdminRequest $request, Leave $leave, LeavesProcessService $service)
    {
        try {
            DB::beginTransaction();
            $employee = Employee::with("section")->where("id",$leave->employee_id)->first();
            $leave_type = LeaveType::query()->find($request->leave_type_id);
            if ($service->checkAllProcess($request,$employee,$leave_type)){
                $data = [
                    "employee_id" => $employee->id,
                    "leave_type_id" => $leave_type->id,
                    "from_date" => $request->from_date,
                    "to_date" => $request->to_date,
                ];
                if (!is_null($request->count_hours)){
                    $data["count_hours"] = $request->count_hours;
                }
                if (!is_null($request->minutes)){
                    $data["minutes"] = $request->minutes;
                }
                $from = Carbon::parse($request->from_date)->format("Y-m-d");
                $to = Carbon::parse($request->to_date)->format("Y-m-d");
                $data["count_days"] = Carbon::createFromFormat("Y-m-d",$to)->diffInDays($from);
                $data["status"] = "approve";
                $data["description"] = $request->description;
                $leave->update($data);
            }
            DB::commit();
            return $this->responseSuccess(null,null,"update",self::IndexRoute);
        }catch (Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    public function MultiDelete(Request $request)
    {
        $request->validate([
            "ids" => ["array","required"],
            "ids.*" => ["required",Rule::exists("leaves","id")],
        ]);
        Leave::query()->whereIn("id",$request->ids)->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function ExportXls(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'],$data['body']),"leaves.xlsx");
    }

    public function ExportPDF(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return ExportPDF::downloadPDF($data['head'],$data['body']);
    }

    /**
     * @param Request $request
     * @return array
     * @author moner khalil
     */
    private function MainExportData(Request $request): array
    {
        $request->validate([
            "ids" => ["sometimes","array"],
            "ids.*" => ["sometimes",Rule::exists("leaves","id")],
        ]);
        $query = Leave::query();
        $query = isset($request->ids) ? $query->whereIn("id",$request->ids) : $query;
        //search name employee
        if (isset($request->filter["name_employee"]) && !is_null($request->filter["name_employee"])){
            $query = $query->whereHas("employee",function ($q) use ($request){
                $q->where("first_name","Like","%".$request->filter["name_employee"]."&")
                    ->orWhere("last_name","Like","%".$request->filter["name_employee"]."&");
            });
        }
        $data = MyApp::Classes()->Search->getDataFilter($query,null,true);
        $head = [
            [
                "head"=> "leave_type",
                "relationFunc" => "leave_type",
                "key" => "name",
            ],
            [
                "head"=> "employee",
                "relationFunc" => "employee",
                "key" => "name",
            ]
            ,"from_date","to_date", "count_days",
            "count_hours","minutes",
            "description",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }
}
