<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Http\Requests\LeaveAdminRequest;
use App\Http\Requests\LeaveRequest;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Services\LeavesProcessService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveAdminController extends Controller
{
    public const NameBlade = "";
    public const IndexRoute = "system.leaves_admin.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Leave::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Leave::with(["leave_type","employee"]);
        //search name employee
        if (isset($request->filter["name_employee"]) && !is_null($request->filter["name_employee"])){
            $data = $data->whereHas("employee",function ($q) use ($request){
                $q->where("first_name","Like","%".$request->filter["name_employee"]."&")
                    ->orWhere("last_name","Like","%".$request->filter["name_employee"]."&");
            });
        }
        //search select leave type..
        $leave_types = LeaveType::query()->pluck("name","id")->toArray();
        return $this->responseSuccess(self::NameBlade,compact("data","leave_types"));
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
                if ($service->sss()){
                    Leave::create([]);
                }
            }
            DB::commit();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveRequest $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }

    public function MultiDelete(Request $request)
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
