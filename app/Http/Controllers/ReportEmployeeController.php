<?php

namespace App\Http\Controllers;

use App\Exports\TableCustomExport;
use App\HelpersClasses\MyApp;
use App\Http\Requests\ReportEmployeeRequest;
use App\Models\Education_level;
use App\Models\Employee;
use App\Models\Language;
use App\Models\Membership_type;
use App\Models\Position;
use App\Models\Sections;
use App\Models\TypeDecision;
use Maatwebsite\Excel\Facades\Excel;

class ReportEmployeeController extends Controller
{
    private $finalQueryFilter;

    public function __construct()
    {
        $table = app(Employee::class)->getTable();
        $this->middleware(["permission:read_".$table."|all_".$table])->only(["showCreateReport","Report"]);
        $this->middleware(["permission:export_".$table."|all_".$table])->only(["ReportXlsx","ReportPdf"]);
        $this->finalQueryFilter = Employee::query();
    }

    public function showCreateReport(){
        $sections = Sections::query()->pluck("name","id")->toArray();
        $gender = ["male","female"];
        $contract_type = ["permanent", "temporary"];
        $education_level = Education_level::query()->pluck("name","id")->toArray();
        $language_skills_read_write = ["Beginner","Intermediate","Advanced"];
        $language = Language::query()->pluck("name","id")->toArray();
        $membership_type = Membership_type::query()->pluck("name","id")->toArray();
        $position = Position::query()->pluck("name","id")->toArray();
        $type_decision = TypeDecision::query()->pluck("name","id")->toArray();
        return $this->responseSuccess("System/Pages/Actors/Reports/reportEmployeesForm",
            compact("sections","gender", "contract_type","education_level","language"
                ,"language_skills_read_write","membership_type","position","type_decision",
        ));
    }

    public function Report(ReportEmployeeRequest $request){
        $dataSelected = array_filter($request->validated(),function($var){return !is_null($var);});
        $finalData = MyApp::Classes()->Search->dataPaginate($this->MainQueryReport($request));
        return $this->responseSuccess("...",compact("finalData","dataSelected"));
    }

    public function ReportPdf(ReportEmployeeRequest $request){
        $dataSelected = array_filter($request->validated(),function($var){return !is_null($var);});
        $query = $this->MainQueryReport($request);
        $finalData = isset($request->ids) && is_array($request->ids) ?
            $query->whereIn("id",$request->ids) : $query;
        $finalData = $finalData->get();
        return $this->responseSuccess("...",compact("finalData","dataSelected"));
    }

    public function ReportXlsx(ReportEmployeeRequest $request){
        $data = $this->ExportXlsxData($request);
        $dataSelected = array_filter($request->validated(),function($var){return !is_null($var);});
        return Excel::download(new TableCustomExport($data['head'],$data['body'],"ReportEmployee",["dataSelected"=>$dataSelected]),"ReportEmployee.xlsx");
    }

    private function ExportXlsxData(ReportEmployeeRequest $request): array
    {
        $query = $this->MainQueryReport($request);
        $query = isset($request->ids) && is_array($request->ids) ?
            $query->whereIn("id",$request->ids) : $query;
        $data = $query->get();
        $head = [
            [
                "head"=> "department",
                "relationFunc" => "section",
                "key" => "name",
            ],
            "name",
            [
                "head"=> "nationality",
                "relationFunc" => "nationality_country",
                "key" => "country_name",
            ],
            "NP_registration","number_national","number_self","gender","current_job","military_service", "family_status","birth_date",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }

    private function MainQueryReport($request){
        //Sections
        $this->finalQueryFilter = !is_null($request->section_id) ?
            $this->finalQueryFilter->where("section_id",$request->section_id) : $this->finalQueryFilter;
        //DateContract
        $this->finalQueryFilter = $this->CompareDateStatic($request->from_contract_direct_date,$request->to_contract_direct_date
            ,"contract_direct_date","contract");
        //DataEndService
        $this->finalQueryFilter = $this->CompareDateStatic($request->from_end_break_date,$request->to_end_break_date
            ,"end_break_date","data_end_service");
        //BarthDate
        $this->finalQueryFilter = $this->CompareDateStatic($request->from_birth_date,$request->to_birth_date,"birth_date");
        //Gender
        $this->finalQueryFilter = !is_null($request->gender) ?
            $this->finalQueryFilter->where("gender",$request->gender) : $this->finalQueryFilter;
        //FamilyStatus
        $this->finalQueryFilter = !is_null($request->family_status) ?
            $this->finalQueryFilter->where("family_status",$request->family_status) : $this->finalQueryFilter;
        //CurrentJob
        $this->finalQueryFilter = !is_null($request->current_job) ?
            $this->finalQueryFilter->where("current_job","LIKE","%".$request->current_job."%") : $this->finalQueryFilter;
        //ContractType
        $this->finalQueryFilter = !is_null($request->contract_type) ?
            $this->finalQueryFilter->with("contract")
                ->whereHas("contract",function ($q) use ($request){
                    $q->where("contract_type",$request->contract_type);
                }) : $this->finalQueryFilter;
        //EducationLevel
        $this->finalQueryFilter = !is_null($request->education_level_id) ?
            $this->finalQueryFilter
                ->whereHas("education_data",function ($q)use($request){
                    $q->where("id_ed_lev",$request->education_level_id);
                }) : $this->finalQueryFilter;
        //LanguageSkill
        $this->finalQueryFilter = !is_null($request->language_id) ?
            $this->finalQueryFilter
                ->whereHas("language_skill",function ($q)use($request){
                    $q->where("language_id",$request->language_id)
                        ->when(!is_null($request->language_write),function ($q) use($request){
                            $q->where("write",$request->language_write);
                        })
                        ->when(!is_null($request->language_read),function ($q) use($request){
                            $q->where("read",$request->language_read);
                        });
                }) : $this->finalQueryFilter;
        //MembershipType
        $this->finalQueryFilter = !is_null($request->membership_type_id) ?
            $this->finalQueryFilter
                ->whereHas("membership",function ($q)use($request){
                    $q->where("member_type_id",$request->membership_type_id);
                }) : $this->finalQueryFilter;
        //Position
        $this->finalQueryFilter = !is_null($request->position_id) ?
            $this->finalQueryFilter->with("positions")
                ->whereHas("positions",function ($q)use($request){
                    $q->where("position_id",$request->position_id);
                }) : $this->finalQueryFilter;
        //Conference
        $this->finalQueryFilter = $this->CompareDateStatic($request->from_conference_date,$request->to_conference_date,
            "start_date","conferences");
        //Decision
        $this->finalQueryFilter = $this->CompareDateStatic($request->from_decision_date,$request->to_decision_date,
            "date","decision_employees");
        $this->finalQueryFilter = !is_null($request->type_decision_id) ?
            $this->finalQueryFilter->with("decision_employees")
                ->whereHas("decision_employees",function ($q)use($request){
                    $q->where("type_decision_id",$request->type_decision_id);
                }) : $this->finalQueryFilter;
        //Salary
        $this->finalQueryFilter = !is_null($request->form_salary) && !is_null($request->to_salary) ?
            $this->finalQueryFilter->with("contract")
                ->whereHas("contract",function ($q) use ($request){
                    $q->whereBetween("salary",[$request->form_salary,$request->to_salary]);
                }) : $this->finalQueryFilter;
        $this->finalQueryFilter = !is_null($request->salary) ?
            $this->finalQueryFilter->with("contract")
                ->whereHas("contract",function ($q) use ($request){
                    $q->where("salary","<=",$request->salary);
                }) : $this->finalQueryFilter;
        return $this->finalQueryFilter->orderBy("id","desc");
    }

    private function CompareDateStatic($from_date,$to_date,$name_column,$relation = null){
        if (!is_null($from_date) && !is_null($to_date)){
            $from_date = MyApp::Classes()->stringProcess->DateFormat($from_date);
            $to_date = MyApp::Classes()->stringProcess->DateFormat($to_date);
            if (is_string($from_date) && is_string($to_date) && ($from_date <= $to_date)){
                $compareTwoDate = [$from_date,$to_date];
                if (!is_null($relation)){
                    $this->finalQueryFilter = $this->finalQueryFilter->with($relation)
                        ->whereHas($relation,function ($q) use ($from_date,$to_date,$name_column,$compareTwoDate){
                            $q->whereBetween($name_column,$compareTwoDate);
                        });
                }else{
                    $this->finalQueryFilter = $this->finalQueryFilter->whereBetween($name_column,$compareTwoDate);
                }
            }
        }
        return $this->finalQueryFilter;
    }

}
