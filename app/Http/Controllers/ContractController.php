<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Models\Contract;
use App\Http\Requests\ContractRequest;
use App\Models\Employee;
use App\Models\Sections;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class ContractController extends Controller
{
    const Folder = "users";
    const IndexRoute = "employees.contract.index";

//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Contract::class)->getTable());
//    }


    public function index()
    {
        $contracts = MyApp::Classes()->Search->getDataFilter(Contract::query());
        $request = request();
        $contracts = Contract::filter($request->query())
            ->get();

//       $contracts=Contract::with('employee')
//        ->filter($request->query())
//            ->get();
//       $employees= Employee::query()->where("first_name",$request->name);
        //  $contracts=Contract::


//        $contracts = DB::table('employees')
//            ->join('contracts', function ($join) use ($x) {
//                $join->on('employees.id', '=', 'contracts.employee_id')
////                    ->when($request['contract_type'] ?? false, function ($builder, $value) {
////                        $builder->where('contracts.contract_type', '=', "$value");
////                    })
////                    ->when($filters['contract_number'] ?? false, function ($builder, $value) {
////                        $builder->where('contracts.contract_number', 'LIKE', "%{$value}%");
////                    })
////                    ->when($filters['first_name'] ?? false, function ($builder, $value) {
////                        $builder->where('employees.first_name', 'LIKE', "%{$value}%");
////                    });
//                    ->where('contracts.contract_number', '=', $x)
//                    ->where('contract_type', '=', "permanent")
//                    ->where('employees.first_name', 'LIKE', "hamza");
//            })
//            ->get();

//        return Response()->json([
//            'contracts' => $contracts,
////            'education' => $education,
////            'contact'=>$contact,
//        ]);

        return $this->responseSuccess("", compact("contracts"));

    }

    public function create()
    {
        return $this->responseSuccess("", $this->shareByBlade());
    }

    private function shareByBlade()
    {

        $contract_type = ["permanent", "temporary"];
        $user_name = User::query()->pluck('name', "id")->toArray();
        $sections = Sections::query()->pluck("name", "id")->toArray();
        return compact('contract_type', 'user_name', 'sections');
    }

    public function store(ContractRequest $request)
    {
        try {
            DB::beginTransaction();
            Contract::create($request->validated());
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
        return $this->responseSuccess("", compact("contract"));
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


    public function update(ContractRequest $request, $contract)
    {
        $employeeQuery = Contract::query();
        $employee_id =is_null($contract)? Employee::where("user_id", Auth()->id())->pluck("id"):null;
        $employee = is_null($contract) ? $employeeQuery->where("employee_id",$employee_id)->firstOrFail()
            : $employeeQuery->findOrFail($contract);
        $employee->update($request->validated());
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    public function destroy($id)
    {
        Contract::destroy($id);
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }


    public function trash()
    {
        $contracts = Contract::onlyTrashed()->paginate();
        return $this->responseSuccess(null,compact('contracts'));
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
