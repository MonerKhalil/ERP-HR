<?php

namespace App\Http\Controllers;

use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\WorkSettingRequest;
use App\Models\WorkSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class WorkSettingController extends Controller
{
    public const NameBlade = "System/Pages/Actors/Setting/workSetting";
    public const IndexRoute = "system.work_settings.index";

    public function __construct()
    {
//        $this->addMiddlewarePermissionsToFunctions(app(WorkSetting::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = \Days();
        $data = MyApp::Classes()->Search->getDataFilter(WorkSetting::query());
        return $this->responseSuccess(self::NameBlade,compact("data","days"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Days();
        return $this->responseSuccess("...",compact("days"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkSettingRequest $request)
    {
        $daysLeaves = $request->days;
        $h_from = Carbon::parse($request->work_hours_from)->format("H:i:s");
        $h_to = Carbon::parse($request->work_hours_to)->format("H:i:s");
        $count_days_work_in_weeks = count(Days()) - count($daysLeaves);
        $count_hours_work_in_days = Carbon::createFromFormat("H:i:s",$h_to)->diffInHours($h_from);
        $daysLeaves = implode(",",$daysLeaves);
        WorkSetting::create([
            "name" => $request->name,
            "count_hours_work_in_days" => $count_hours_work_in_days,
            "count_days_work_in_weeks" => $count_days_work_in_weeks,
            "days_leaves_in_weeks" => $daysLeaves,
            "work_hours_from" => $h_from,
            "work_hours_to" => $h_to,
            "description" => $request->description,
        ]);
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkSetting  $workSetting
     * @return \Illuminate\Http\Response
     */
    public function show(WorkSetting $workSetting)
    {
        return $this->responseSuccess("...",compact("workSetting"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkSetting  $workSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkSetting $workSetting)
    {
        $days = Days();
        return $this->responseSuccess("...",compact("days","workSetting"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkSetting  $workSetting
     * @return \Illuminate\Http\Response
     */
    public function update(WorkSettingRequest $request, WorkSetting $workSetting)
    {
        $daysLeaves = $request->days;
        $h_from = Carbon::parse($request->work_hours_from)->format("H:i:s");
        $h_to = Carbon::parse($request->work_hours_to)->format("H:i:s");
        $count_days_work_in_weeks = count(Days()) - count($daysLeaves);
        $count_hours_work_in_days = Carbon::createFromFormat("H:i:s",$h_to)->diffInHours($h_from);
        $daysLeaves = implode(",",$daysLeaves);
        $workSetting->update([
            "name" => $request->name,
            "count_hours_work_in_days" => $count_hours_work_in_days,
            "count_days_work_in_weeks" => $count_days_work_in_weeks,
            "days_leaves_in_weeks" => $daysLeaves,
            "work_hours_from" => $h_from,
            "work_hours_to" => $h_to,
            "description" => is_null($request->description) ? $workSetting->description : $request->description,
        ]);
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkSetting  $workSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkSetting $workSetting)
    {
        $workSetting->delete();
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    public function MultiDelete(Request $request)
    {
        $request->validate([
            "ids" => ["array","required"],
            "ids.*" => ["required",Rule::exists("work_settings","id")],
        ]);
        WorkSetting::query()->whereIn("id",$request->ids)->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function ExportXls(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'],$data['body']),"work_settings.xlsx");
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
            "ids.*" => ["sometimes",Rule::exists("work_settings","id")],
        ]);
        $query = WorkSetting::query();
        $query = isset($request->ids) ? $query->whereIn("id",$request->ids) : $query;
        $data = MyApp::Classes()->Search->getDataFilter($query,null,true);
        $head = [
            "name","count_days_work_in_weeks","count_hours_work_in_days",
            "days_leaves_in_weeks",
            "work_hours_from","work_hours_to","description",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }
}
