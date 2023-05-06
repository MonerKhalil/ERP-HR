<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MessagesFlash;
use App\HelpersClasses\MyApp;
use App\Models\Decision;
use App\Http\Requests\DecisionRequest;
use App\Models\Employee;
use App\Models\SessionDecision;
use App\Models\TypeDecision;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DecisionController extends Controller
{
    public const NameBlade = "";
    public const Folder = "decisions";
    public const IndexRoute = "system.decisions.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Decision::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = Decision::with(["type_decision","session_decision"]);
        $filter = isset($request->filter) && is_array($request->filter) ? $request->filter : [];
        if (isset($filter['start_date']) && isset($filter['end_date'])){
            if (strtotime($filter['start_date']) <= strtotime($filter['end_date'])){
                $q = $q->whereBetween("date",[$filter['start_date'],$filter['end_date']]);
            }
        }
        $data = MyApp::Classes()->Search->getDataFilter($q);
        return $this->responseSuccess(self::NameBlade,compact("data"));
    }

    public function create()
    {
        $session_decisions = SessionDecision::query()->pluck("name","id")->toArray();
        $employees = Employee::query()->select(["id"."first_name","last_name"])->get();
        $type_decisions = TypeDecision::query()->pluck("name","id")->toArray();
        $type_effects = Decision::effectSalary();
        return $this->responseSuccess("",compact("employees","session_decisions","type_decisions","type_effects"));
    }


    /**
     * @param DecisionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     * @throws MainException
     */
    public function store(DecisionRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = Arr::except($request->validated(),["employees"]);
            if (isset($data['image'])){
                $image = MyApp::Classes()->storageFiles->Upload($data['image']);
                if (is_bool($image)){
                    MessagesFlash::Errors(__("err_image_upload"));
                    return redirect()->back();
                }
                $data['image'] = $image;
            }
            $decision = Decision::create($data);
            $decision->employees()->syncWithoutDetaching($request->employees);
            DB::commit();
            return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    public function show(Decision $decision)
    {
        $decision = Decision::with(["type_decision","session_decision","employees"])
            ->where("id",$decision->id)->firstOrFail();
        return $this->responseSuccess("",compact("decision"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function edit(Decision $decision)
    {
        $session_decisions = SessionDecision::query()->pluck("name","id")->toArray();
        $employees = Employee::query()->select(["id"."first_name","last_name"])->get();
        $type_decisions = TypeDecision::query()->pluck("name","id")->toArray();
        $type_effects = Decision::effectSalary();
        $decision = Decision::with(["type_decision","session_decision","employees"])
            ->where("id",$decision->id)->firstOrFail();
        return $this->responseSuccess("",compact("decision","employees","session_decisions","type_decisions","type_effects"));
    }

    public function update(DecisionRequest $request, Decision $decision)
    {
        try {
            DB::beginTransaction();
            $data = Arr::except($request->validated(),["employees"]);
            if (isset($data['image'])){
                $image = MyApp::Classes()->storageFiles->Upload($data['image']);
                if (is_bool($image)){
                    MessagesFlash::Errors(__("err_image_upload"));
                    return redirect()->back();
                }
                $data['image'] = $image;
            }
            $decision = $decision->update($data);
            if (isset($request->employees)){
                $decision->employees()->syncWithoutDetaching($request->employees);
            }
            DB::commit();
            return $this->responseSuccess(null,null,"update",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    public function destroy(Decision $decision)
    {
        $decision->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function ExportXls()
    {
        //
    }

    public function ExportPDF()
    {
        //
    }
}
