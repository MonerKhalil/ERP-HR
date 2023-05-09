<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use App\Models\Contract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Exception;

class ContractController extends Controller
{
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Contract::class)->getTable());
//    }


    public function index()
    {
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

        return Response()->json([
            'contracts' => $contracts,
//            'education' => $education,
//            'contact'=>$contact,
        ]);

        return $this->responseSuccess("", compact("contracts"));

    }

    public function create()
    {
        return view('dashboard.contract.create', [
            'contract_type' => ["permanent", "temporary"],
            'user_name' => User::query()->pluck('name', "id"),
            //'section_name' =>Section::query()->pluck('name',"id"),
        ]);
    }

    public function store(ContractRequest $request)
    {
        try {
            DB::beginTransaction();
            Contract::create($request->validated());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard.contact.create')
                ->with('info', 'Record not found!');
        }
        return redirect()->route('dashboard.contact.create')
            ->with('success', 'contact created!');
    }

    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return view('dashboard.categories.show', [
            'contract' => $contract
        ]);


    }

    public function edit($id)
    {
        try {
            $contract = Contract::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('dashboard.contract.index')
                ->with('info', 'Record not found!');
        }
        return view('dashboard.contract.edite', compact('contract'), [
            'contract_type' => ["permanent", "temporary"],
            'user_name' => User::query()->pluck('name', "id"),
            //'section_name' =>Section::query()->pluck('name',"id"),
        ]);
    }


    public function update(ContractRequest $request, $id)
    {
        $contract = Contract::find($id);
        if (!is_null($contract))
            $contract->update($request->validated());
        return Redirect::route('dashboard.contract.index')
            ->with('success', 'Contract updated!');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Contract::destroy($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard.contract.index')
                ->with('info', 'error!');
        }
        return Redirect::route('dashboard.contract.index')
            ->with('success', 'Contract deleted!');
    }


    public function trash()
    {
        $contracts = Contract::onlyTrashed()->paginate();
        return view('dashboard.contract.trash', compact('contracts'));
    }

    public function restore($id)
    {
        $contract = Contract::onlyTrashed()->findOrFail($id);
        $contract->restore();
        return redirect()->route('dashboard.contract.trash')
            ->with('succes', 'Contract restored!');
    }

    public function forceDelete($id)
    {
        $contract = Contract::onlyTrashed()->findOrFail($id);
        $contract->forceDelete();
        return redirect()->route('dashboard.contract.trash')
            ->with('success', 'contract deleted forever!');
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
