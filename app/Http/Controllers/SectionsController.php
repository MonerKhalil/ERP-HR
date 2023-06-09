<?php

namespace App\Http\Controllers;

use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Models\Employee;
use App\Models\Sections;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionsRequest;
use App\Models\WorkSetting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class SectionsController extends Controller
{
    public const NameBlade = "..";
    public const IndexRoute = "system.sections.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Sections::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Sections::with(["address","moderator","work_setting"]);
        if (isset($request->filter)&&isset($request->filter['moderator_name'])){
            $query = $query->whereHas("moderator",function ($q)use($request){
                $q->where("first_name","like","%".$request->filter['moderator_name']."%")
                    ->orWhere("last_name","like","%".$request->filter['moderator_name']."%");
            });
        }
        $data = MyApp::Classes()->Search->getDataFilter($query);
        return $this->responseSuccess(self::NameBlade,compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $work_settings = WorkSetting::query()->get();
        $employees = Employee::query()->pluck("name","id")->toArray();
        return $this->responseSuccess("..",compact("employees","work_settings"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionsRequest $request)
    {
        Sections::create($request->validated());
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        $sections = Sections::with(["employees","address","moderator","work_setting"])->findOrFail($sections->id);
        return $this->responseSuccess("...",compact("sections"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections)
    {
        $work_settings = WorkSetting::query()->get();
        $employees = Employee::query()->pluck("name","id")->toArray();
        $sections = Sections::with(["employees","address","moderator"])->findOrFail($sections->id);
        return $this->responseSuccess("...",compact("work_settings","sections","employees"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(SectionsRequest $request, Sections $sections)
    {
        $sections->update($request->validated());
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sections $sections)
    {
        $sections->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function MultiDelete(Request $request)
    {
        $request->validate([
            "ids" => ["array","required"],
            "ids.*" => ["required",Rule::exists("sections","id")],
        ]);
        Sections::query()->whereIn("id",$request->ids)->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function ExportXls(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'],$data['body']),"sections.xlsx");
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
            "ids.*" => ["sometimes", Rule::exists("sections","id")],
        ]);
        $query = Sections::with(["moderator","address"]);
        $query = isset($request->ids) ? $query->whereIn("id",$request->ids) : $query;
        $data = MyApp::Classes()->Search->getDataFilter($query,null,true);
        $head = [
            "name"
            ,[
                "head"=> "address",
                "relationFunc" => "address",
                "key" => "name",
            ],
            [
                "head"=> "moderator",
                "relationFunc" => "moderator",
                "key" => "name",
            ],"details"
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }
}
