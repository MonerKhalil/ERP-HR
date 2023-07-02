<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Http\Requests\DecisionEvaluationRequest;
use App\Http\Requests\EmployeeEvaluationRequest;
use App\Http\Requests\EvaluationMemberRequest;
use App\Models\Decision;
use App\Models\Employee;
use App\Models\EmployeeEvaluation;
use App\Models\EvaluationMember;
use App\Models\SessionDecision;
use App\Models\TypeDecision;
use App\Services\SendNotificationService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EmployeeEvaluationController extends Controller
{
    public const NameBlade = "";
    public const IndexRoute = "system.evaluation.employee.index";
    public const IndexRouteDecision = "system.decisions.index";


    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(EmployeeEvaluation::class)->getTable());
    }

    private function MainQuery($request){
        $data = EmployeeEvaluation::with(["enter_evaluation_employee"]);
        if (isset($request->filter["name_employee"]) && !is_null($request->filter["name_employee"])){
            $data = $data->whereHas("employee",function ($q) use ($request){
                $q->where("first_name","Like","%".$request->filter["name_employee"]."%")
                    ->orWhere("last_name","Like","%".$request->filter["name_employee"]."%");
            });
        }
        if (isset($filterFinal['from_next_evaluation_date']) && isset($filterFinal['to_next_evaluation_date'])){
            $from = MyApp::Classes()->stringProcess->DateFormat($filterFinal['from_next_evaluation_date']);
            $to = MyApp::Classes()->stringProcess->DateFormat($filterFinal['to_next_evaluation_date']);
            if ( is_string($from) && is_string($to) && ($from <= $to) ){
                $data = $data->whereBetween("next_evaluation_date",[$from,$to]);
            }
        }
        return $data;
    }

    public function index(Request $request){
        $data = MyApp::Classes()->Search->getDataFilter($this->MainQuery($request),null,null,"evaluation_date");
        return $this->responseSuccess(self::NameBlade,compact("data"));
    }

    public function create(){
        $employees = Employee::query()->select(["id","first_name","last_name"])->get();
        return $this->responseSuccess("",compact("employees"));
    }

    /**
     * @param EmployeeEvaluationRequest $request
     * @param SendNotificationService $sendNotificationService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     * @throws MainException
     * @author moner khalil
     */
    public function store(EmployeeEvaluationRequest $request, SendNotificationService $sendNotificationService){
        try {
            DB::beginTransaction();
            $employees = Employee::query()->whereIn("id",$request->evaluation_employees)->pluck("user_id");
            $employee = Employee::query()->findOrFail($request->employee_id);
            $EmployeeEvaluation = EmployeeEvaluation::create([
                "employee_id" => $request->employee_id,
                "evaluation_date" => $request->evaluation_date,
                "next_evaluation_date" => $request->next_evaluation_date,
                "description" => $request->description,
            ]);
            foreach ($request->evaluation_employees as $evaluation_employee){
                EvaluationMember::create([
                    "employee_id" => $evaluation_employee,
                    "evaluation_id" => $EmployeeEvaluation->id,
                ]);
            }
            $sendNotificationService->sendNotify($employees,"evaluation_employee","msg_evaluation_employee",
                route("system.evaluation.employee.show.add.evaluation",$EmployeeEvaluation->id),$employee);
            DB::commit();
            return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    public function showEvaluation($evaluation){
        $evaluation = EmployeeEvaluation::with(["employee","enter_evaluation_employee"])->findOrFail($evaluation);
        if (!$evaluation->canShow()){
            throw new AuthorizationException(__("err_permission"));
        }
        return $this->responseSuccess("",compact("evaluation"));
    }

    /**
     * @param Request $request
     * @param $evaluation
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     * @throws AuthorizationException
     * @author moner khalil
     */
    public function showEvaluationAdd($evaluation){
        $evaluation = EmployeeEvaluation::with("employee")->findOrFail($evaluation);
        if (!$evaluation->canEvaluation(auth()->user()->employee->id??"")){
            throw new AuthorizationException(__("err_permission"));
        }
        $typeEvaluation = [
            "performance","professionalism","readiness_for_development"
            ,"collaboration","commitment_and_responsibility"
            ,"innovation_and_creativity","technical_skills",
        ];
        return $this->responseSuccess("",compact("evaluation","typeEvaluation"));
    }

    public function storeEvaluationAdd(EvaluationMemberRequest $evaluationMemberRequest , $evaluation){
        $evaluation = EmployeeEvaluation::query()->findOrFail($evaluation);
        $employee = $evaluationMemberRequest->employee_id ?? auth()->user()->employee->id;
        if (!$evaluation->canEvaluation($employee??"")){
            throw new AuthorizationException(__("err_permission"));
        }
        $evaluationMember = EvaluationMember::query()->where("employee_id",$employee)
            ->where("evaluation_id",$evaluation->id)->first();
        $evaluationMember->update($evaluationMemberRequest->validated());
        return $this->responseSuccess(null,null,"update",null,true);
    }

    public function addDecisionEvaluationShowPage($evaluation){
        //send moderator SessionDecision...
        $employees = Employee::query()->select(["id","first_name","last_name"])->get();
        $evaluation = EmployeeEvaluation::query()->findOrFail($evaluation);
        return $this->responseSuccess("",compact("evaluation","employees"));
    }

    public function storeDecisionEvaluation(DecisionEvaluationRequest $request){
        try {
            DB::beginTransaction();
            $user = auth()->user();
            if ($user->can("create_decisions") || $user->can("all_decisions")){
                $data = $request->validated();
                $evaluation = EmployeeEvaluation::query()->find($request->evaluation_id);
                $evaluationEmployees = EvaluationMember::query()->where("evaluation_id",$request->evaluation_id)->pluck("employee_id");
                $typeDecision = TypeDecision::query()->firstOrCreate(["name"=>"evaluation"],["name"=>"evaluation"]);
                //SessionDecision
                $session = $this->addSession($data,$evaluationEmployees);
                $this->addDecision($data,$typeDecision->id,$evaluation->employee_id,$session->id);
                DB::commit();
                return $this->responseSuccess(null,null,"create",self::IndexRouteDecision);
            }else{
                throw new AuthorizationException(__("err_permission"));
            }
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * @param $data
     * @param $members
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws MainException
     */
    private function addSession($data, $members)
    {
        if (isset($data['image'])){
            $image = MyApp::Classes()->storageFiles->Upload($data['image']);
            if (is_bool($image)){
                throw new \Exception(__("err_image_upload"));
            }
            $data['image'] = $image;
        }
        if (isset($data['file'])){
            $file = MyApp::Classes()->storageFiles->Upload($data['file']);
            if (is_bool($file)){
                throw new \Exception(__("err_file_upload"));
            }
            $data['file'] = $file;
        }
        $Session = SessionDecision::query()->create([
            "moderator_id" => $data["moderator_id"],
            "name" => $data["name"],
            "date_session" => $data["date_session"],
            "file" => $data["file"]??null,
            "image" => $data["image"]??null,
            "description" => $data["description"]??null,
        ]);
        $Session->members()->attach($members);
        return $Session;
    }

    /**
     * @param $data
     * @param $typeDecision_id
     * @param $employee_id
     * @param $session_id
     * @throws MainException
     */
    private function addDecision($data, $typeDecision_id, $employee_id, $session_id){
        if (isset($data['image_decision'])) {
            $image = MyApp::Classes()->storageFiles->Upload($data['image_decision']);
            if (is_bool($image)) {
                throw new \Exception(__("err_image_upload"));
            }
            $data['image_decision'] = $image;
        }
        $decision = Decision::query()->create([
            "type_decision_id" => $typeDecision_id,
            "session_decision_id" => $session_id,
            "number" => $data["number"],
            "effect_salary" => $data["effect_salary"],
            "date" => $data["date"],
            "content" => $data["content"]??null,
            "end_date_decision" => $data["end_date_decision"]??null,
            "value" => $data["value"]??null,
            "rate" => $data["rate"]??null,
            "image_decision" => $data["image_decision"]??null,
        ]);
        $decision->employees()->attach([$employee_id]);
    }

    public function destroy($evaluation){
        $evaluation = EmployeeEvaluation::query()->findOrFail($evaluation);
        $evaluation->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function MultiDelete(Request $request)
    {
        $request->validate([
            "ids" => ["array","required"],
            "ids.*" => ["required",Rule::exists("employee_evaluations","id")],
        ]);
        EmployeeEvaluation::query()->whereIn("id",$request->ids)->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }


}
