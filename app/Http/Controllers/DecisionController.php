<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use App\Models\Decision;
use App\Http\Requests\DecisionRequest;
use App\Models\Employee;
use App\Models\SessionDecision;
use App\Models\TypeDecision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public const NameBlade = "";
    public const Folder = "institutions";
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


    public function store(DecisionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function show(Decision $decision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function edit(Decision $decision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function update(DecisionRequest $request, Decision $decision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decision $decision)
    {
        //
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
