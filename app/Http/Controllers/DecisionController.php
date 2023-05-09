<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MessagesFlash;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Models\Decision;
use App\Http\Requests\DecisionRequest;
use App\Models\Employee;
use App\Models\SessionDecision;
use App\Models\TypeDecision;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class DecisionController extends Controller
{
    public const NameBlade = "";
    public const Folder = "decisions";
    public const IndexRoute = "system.decisions.index";

    public function __construct()
    {
        $table = app(Decision::class)->getTable();
        $this->addMiddlewarePermissionsToFunctions($table);
        $this->middleware(["permission:create_" . $table . "|all_" . $table])->only(["create", "store", "addDecisions"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = Decision::with(["type_decision", "session_decision"]);
        $data = MyApp::Classes()->Search->getDataFilter($q, null, null, "date");
        return $this->responseSuccess(self::NameBlade, compact("data"));
    }

    public function create()
    {
        $session_decisions = SessionDecision::query()->pluck("name", "id")->toArray();
        $employees = Employee::query()->select(["id" . "first_name", "last_name"])->get();
        $type_decisions = TypeDecision::query()->pluck("name", "id")->toArray();
        $type_effects = Decision::effectSalary();
        return $this->responseSuccess("", compact("employees", "session_decisions", "type_decisions", "type_effects"));
    }

    public function addDecisions($session_decisions)
    {
        $session_decisions = SessionDecision::query()->where("id", $session_decisions)->firstOrFail();
        $employees = Employee::query()->select(["id" . "first_name", "last_name"])->get();
        $type_decisions = TypeDecision::query()->pluck("name", "id")->toArray();
        $type_effects = Decision::effectSalary();
        return $this->responseSuccess("", compact("employees", "session_decisions", "type_decisions", "type_effects"));
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
            $data = Arr::except($request->validated(), ["employees"]);
            if (isset($data['image'])) {
                $image = MyApp::Classes()->storageFiles->Upload($data['image']);
                if (is_bool($image)) {
                    MessagesFlash::Errors(__("err_image_upload"));
                    return redirect()->back();
                }
                $data['image'] = $image;
            }
            $decision = Decision::create($data);
            $decision->employees()->syncWithoutDetaching($request->employees);
            DB::commit();
            return $this->responseSuccess(null, null, "create", self::IndexRoute);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    public function show(Decision $decision)
    {
        $decision = Decision::with(["type_decision", "session_decision", "employees"])
            ->where("id", $decision->id)->firstOrFail();
        return $this->responseSuccess("", compact("decision"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Decision $decision
     * @return \Illuminate\Http\Response
     */
    public function edit(Decision $decision)
    {
        $session_decisions = SessionDecision::query()->pluck("name", "id")->toArray();
        $employees = Employee::query()->select(["id" . "first_name", "last_name"])->get();
        $type_decisions = TypeDecision::query()->pluck("name", "id")->toArray();
        $type_effects = Decision::effectSalary();
        $decision = Decision::with(["type_decision", "session_decision", "employees"])
            ->where("id", $decision->id)->firstOrFail();
        return $this->responseSuccess("", compact("decision", "employees", "session_decisions", "type_decisions", "type_effects"));
    }

    public function update(DecisionRequest $request, Decision $decision)
    {
        try {
            DB::beginTransaction();
            $data = Arr::except($request->validated(), ["employees"]);
            if (isset($data['image'])) {
                $image = MyApp::Classes()->storageFiles->Upload($data['image']);
                if (is_bool($image)) {
                    MessagesFlash::Errors(__("err_image_upload"));
                    return redirect()->back();
                }
                $data['image'] = $image;
            }
            $decision = $decision->update($data);
            if (isset($request->employees)) {
                $decision->employees()->syncWithoutDetaching($request->employees);
            }
            DB::commit();
            return $this->responseSuccess(null, null, "update", self::IndexRoute);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    public function destroy(Decision $decision)
    {
        $decision->delete();
        return $this->responseSuccess(null, null, "delete", self::IndexRoute);
    }

    public function MultiDelete(Request $request)
    {
        $request->validate([
            "ids" => ["array", "required"],
            "ids.*" => ["required", Rule::exists("decisions", "id")],
        ]);
        Decision::query()->whereIn("id", $request->ids)->delete();
        return $this->responseSuccess(null, null, "delete", self::IndexRoute);
    }

    public function PrintDecision($decision)
    {
        $decision = Decision::with(["type_decision", "session_decision"])
            ->where("id",$decision)->firstOrFail();
//        return response()->view("System.Pages.Docs.decisionPrint",compact('decision'));
        return \PDF::loadView("System.Pages.Docs.decisionPrint", [
            "data" => $decision
        ]);
    }

    public function ExportXls(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'], $data['body'], "test"), self::Folder . ".xlsx");
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
            "ids.*" => ["sometimes",Rule::exists("decisions","id")],
        ]);
        $query = Decision::query();
        $query = isset($request->ids) ? $query->whereIn("id",$request->ids) : $query;
        $data = MyApp::Classes()->Search->getDataFilter($query,null,true);
        $head = [
            [
                "head" => "type_decision",
                "relationFunc" => "type_decision",
                "key" => "name",
            ] ,
            [
                "head"=> "name_session_decision",
                "relationFunc" => "session_decision",
                "key" => "name",
            ],
            "number" , "date" ,"content","effect_salary","end_date_decision", "created_at",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }
}
