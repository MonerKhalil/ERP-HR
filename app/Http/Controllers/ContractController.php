<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Models\Contract;
use App\Http\Requests\ContractRequest;
use App\Models\Employee;
use App\Models\Sections;
use App\Models\User;
use App\Services\OverTimeCheckService;
use App\Services\YearsEmployeeService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Exception;

class ContractController extends Controller
{
    const Folder = "users";
    const IndexRoute = "system.employees.contract.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Contract::class)->getTable());
    }


    public function index(Request $request)
    {
        $q = Contract::with('employee');
        $q = !is_null($request->employee_name) ? $q->whereHas("employee", function ($q) use ($request) {
            $q->where("first_name", "=", $request->employee_name);
        }) : $q;
//
        $contracts = MyApp::Classes()->Search->getDataFilter($q, null, null, "contract_date");

        return $this->responseSuccess("System.Pages.Actors.HR_Manager.viewContracts", compact("contracts"));


    }


    public function create()
    {
        return $this->responseSuccess("System.Pages.Actors.HR_Manager.addContract", $this->shareByBlade());
    }

    private function shareByBlade()
    {

        $contract_type = ["permanent", "temporary"];
        // I need to add an empty option at the first
        $employees_names = Employee::query()->pluck('first_name', "id")->toArray();
        $sections = Sections::query()->pluck("name", "id")->toArray();
        return compact('contract_type', 'employees_names', 'sections');
    }

    public function store(ContractRequest $request,YearsEmployeeService $yearsEmployeeService)
    {
        try {
            DB::beginTransaction();
            Contract::create($request->validated());
            $yearsEmployeeService->updateServicesYearsEmployee($request->employee_id);
            DB::commit();
            return $this->responseSuccess(null, null, "create", self::IndexRoute);
        } catch (Exception $exception) {
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    public function show($contract = null)
    {

        //        $contractQuery=    User::join('employees', 'employees.user_id', '=', 'users.id')
//            ->join('contracts', 'contracts.employee_id', '=', 'employees.id')
//            ->where('users.id', 1);

        if (is_null($contract)) {
            $contractQuery = Contract::with([
                "employee" => function ($q) {
                    return $q->with(["user"])
                        ->where('employees.user_id', Auth()->id())
                        ->get();
                },
            ]);
            $employee_id = Employee::where("user_id", Auth()->id())->pluck("id");
            $contract = $contractQuery->where("employee_id", $employee_id)->get();
        } else {
            $contractQuery = Contract::with([
                "employee" => function ($q) {
                    return $q->with(["user"])->get();
                },
            ]);
            $contract = $contractQuery->findOrFail($contract);
        }
        return $this->responseSuccess("System.Pages.Actors.HR_Manager.viewContract", compact("contract"));
    }

    public function edit($contract = null)
    {
        $data = $this->shareByBlade();
        if (is_null($contract)) {
            $contractQuery = Contract::with([
                "employee" => function ($q) {
                    return $q->with(["user"])
                        ->where('employees.user_id', Auth()->id())
                        ->get();
                },
            ]);
            $employee_id = Employee::where("user_id", Auth()->id())->pluck("id");
            $data['contract'] = $contractQuery->where("employee_id", $employee_id)->get();
        } else {
            $contractQuery = Contract::with([
                "employee" => function ($q) {
                    return $q->with(["user"])->get();
                },
            ]);
            $data['contract'] = $contractQuery->findOrFail($contract);

        }
        return $this->responseSuccess("", $data);
    }


    public function update(ContractRequest $request, $contract,YearsEmployeeService $yearsEmployeeService)
    {
        $contract = Contract::query()->findOrFail($contract);
        try {
            DB::beginTransaction();
            $contract->update($request->validated());
            $yearsEmployeeService->updateServicesYearsEmployee();
            DB::commit();
            return $this->responseSuccess(null, null, "update", self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    public function destroy($id)
    {

        Contract::query()->findOrFail($id)->delete();

        return $this->responseSuccess(null, null, "delete", self::IndexRoute);
    }


    public function trash()
    {
        $contracts = Contract::onlyTrashed()->paginate();
        return $this->responseSuccess(null, compact('contracts'));
    }

    public function restore($id)
    {
        $contract = Contract::onlyTrashed()->findOrFail($id);
        $contract->restore();

    }

    public function forceDelete($id)
    {
        $contract = Contract::onlyTrashed()->findOrFail($id);
        $contract->forceDelete();
        return $this->responseSuccess(null, null, "delete", self::IndexRoute);
    }

    public function MultiContractsDelete(Request $request)
    {
        $request->validate([
            "ids" => ["required", "array"],
            "ids.*" => ["required", Rule::exists("contracts", "id")],
        ]);
        try {
            DB::beginTransaction();
            Contract::query()->whereIn("id", $request->ids)->delete();
            DB::commit();
            $this->responseSuccess(null, null, "delete", self::IndexRoute);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new MainException($e->getMessage());
        }
    }

    public function ExportXls(Request $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'], $data['body'], "test"), self::Folder . ".xlsx");
    }

    public function ExportPDF(Request $request)
    {
        $data = $this->MainExportData($request);
        return ExportPDF::downloadPDF($data['head'], $data['body']);
    }

    private function MainExportData(Request $request): array
    {
        $request->validate([
            "ids" => ["required", "array"],
            "ids.*" => ["required", Rule::exists("contracts", "id")],
            //  "contracts.*.user_id" => ["required", Rule::exists("users", "id")],
        ]);


        $query = Contract::with(["employee","section"]);
        $query = isset($request->ids) ? $query->whereIn("id", $request->ids) : $query;
        $data = MyApp::Classes()->Search->getDataFilter($query, null, true);
        $head = [
            [
                "head" => "name_section",
                "relationFunc" => "section",
                "key" => "name",
            ],
            [
                "head" => "name_employee",
                "relationFunc" => "employee",
                "key" => "name",
            ],
            "contract_type", "contract_number", "contract_date", "contract_finish_date",
            "contract_direct_date", "salary", "created_at",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }
}
