<?php

namespace App\Http\Controllers;

use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PayrollController extends Controller
{
    public const NameBlade = "System/Pages/Actors/Payroll/payrollDetailsAdmin";

    public function __construct()
    {
        $this->middleware("employee")->only("salaryDetails");
        $this->middleware(["permission:all_payrolls"])->only(["create","store"]);
    }

    private function MainQuery($request ,$employee_id){
        $payroll = Payroll::with("employee")
            ->where("employee_id",$employee_id);

        if (isset($request->year) && !is_null($request->year)){
            $payroll = $payroll->whereYear("created_at",$request->year);
        }

        if (isset($request->month) && !is_null($request->month)){
            if (is_null($request->year)){
                $payroll = $payroll
                    ->whereYear("created_at",now()->year)
                    ->whereMonth("created_at",$request->month);
            }else{
                $payroll = $payroll->whereMonth("created_at",$request->month);
            }
        }
        return $payroll->orderByDesc("created_at");
    }

    public function salaryDetails(Request $request){
        $employee = auth()->user()->employee->id;
        $data = MyApp::Classes()->Search->dataPaginate($this->MainQuery($request,$employee));
        return $this->responseSuccess(self::NameBlade ,
            compact("data"));
    }

    public function salaryDetailsEmployee(Request $request,$employee){
        $employee = Employee::query()->findOrFail($employee);
        $employee = $employee->id;
        $data = MyApp::Classes()->Search->dataPaginate($this->MainQuery($request,$employee));
        return $this->responseSuccess(self::NameBlade ,
            compact("data","employee"));
    }

    public function ExportXls(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'],$data['body']),"payrolls.xlsx");
    }

    public function ExportPDF(BaseRequest $request) {
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
            "employee_id" => ["required",Rule::exists("employees","id")],
            "ids" => ["sometimes","array"],
            "ids.*" => ["sometimes",Rule::exists("payrolls","id")],
        ]);
        $query = $this->mainQuery($request,$request->employee_id);

        if (isset($request->employee_id) && !is_null($request->employee_id)){
            $query = $query->where("employee_id",$request->employee_id);
        }

        $data = $query->get();

        $head = [
            [
                "head"=> "employee",
                "relationFunc" => "employee",
                "key" => "name",
            ],
            "total_salary",
            "overtime_value","bonuses_decision","penalties_decision",
            "absence_days_value",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }

}
