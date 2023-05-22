<?php

namespace App\Http\Controllers;

use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\DataEndServiceRequest;
use App\Models\DataEndService;
use App\Models\Decision;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class DataEndServiceController extends Controller
{
    public const NameBlade = "";
    public const Folder = "data_end_services";
    public const IndexRoute = "system.data_end_services.index";

//    public function __construct()
//    {
//        $table = app(DataEndService::class)->getTable();
//        $this->addMiddlewarePermissionsToFunctions($table);
//        $this->middleware(["permission:create_".$table."|all_".$table])->only(["create","store","createFromEmployee"]);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataEnd = DataEndService::with(["employee","decision"])->whereNotNull("decision_id");
        $employees = Employee::query()->select(["first_name","last_name","id"])->get();
        $decisions = Decision::query()->pluck("name","id")->toArray();
        $reason = DataEndService::Reasons();
        $data = MyApp::Classes()->Search->getDataFilter($DataEnd);
        return $this->responseSuccess(self::NameBlade,compact("data",'reason','decisions','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::query()->select(["first_name","last_name","id"])->get();
        $decision = Decision::query()->pluck("name","id")->toArray();
        $reason = DataEndService::Reasons();
        return $this->responseSuccess("",compact("employees","reason","decision"));
    }

    public function createFromEmployee($employee){
        $employee = Employee::query()->findOrFail($employee);
        $decisions = Decision::query()->pluck("name","id")->toArray();
        $reason = DataEndService::Reasons();
        return $this->responseSuccess("",compact("employee","reason","decisions"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataEndServiceRequest $request)
    {
        DataEndService::create($request->validated());
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataEndService  $dataEndService
     * @return \Illuminate\Http\Response
     */
    public function show(DataEndService $dataEndService)
    {
        $dataEndService = DataEndService::with(["employee","decision"])->findOrFail($dataEndService->id);
        return $this->responseSuccess("...",compact("dataEndService"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataEndService  $dataEndService
     * @return \Illuminate\Http\Response
     */
    public function edit(DataEndService $dataEndService)
    {
        $dataEndService = DataEndService::with(["employee","decision"])->findOrFail($dataEndService->id);
        $employee = Employee::query()->select(["first_name","last_name","id"])->get();
        $decision = Decision::query()->pluck("name","id")->toArray();
        $reason = DataEndService::Reasons();
        return $this->responseSuccess("",compact("dataEndService","employee","reason","decision"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataEndService  $dataEndService
     * @return \Illuminate\Http\Response
     */
    public function update(DataEndServiceRequest $request, DataEndService $dataEndService)
    {
        $dataEndService->update($request->validated());
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataEndService  $dataEndService
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataEndService $dataEndService)
    {
        $dataEndService->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function MultiDelete(Request $request)
    {
        $request->validate([
            "ids" => ["array","required"],
            "ids.*" => ["required",Rule::exists("data_end_services","id")],
        ]);
        DataEndService::query()->whereIn("id",$request->ids)->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function ExportXls(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'],$data['body'],"test"),".xlsx");
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
            "ids.*" => ["sometimes",Rule::exists("data_end_services","id")],
        ]);
        $query = DataEndService::query();
        $query = isset($request->ids) ? $query->whereIn("id",$request->ids) : $query;
        $data = MyApp::Classes()->Search->getDataFilter($query,null,true);
        $head = [
            [
                "head"=> "employee",
                "relationFunc" => "employee",
                "key" => "name",
            ],
            [
                "head"=> "decision",
                "relationFunc" => "decision",
                "key" => "number",
            ],
            "reason","reason_other","start_break_date","end_break_date",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }
}
