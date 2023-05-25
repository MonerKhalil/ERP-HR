<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportEmployeeRequest;
use App\Models\Conference;
use App\Models\Education_level;
use App\Models\Employee;
use App\Models\Language;
use App\Models\Membership_type;
use App\Models\Position;
use App\Models\Sections;
use App\Models\TypeDecision;
use Illuminate\Database\Eloquent\Builder;

class ReportEmployeeController extends Controller
{
    private $finalQueryFilter;

    public function __construct()
    {
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
        return $this->responseSuccess("...",compact("sections","gender",
            "contract_type","education_level","language","language_skills_read_write","membership_type"
            ,"position","type_decision",
        ));
    }

    public function Report(ReportEmployeeRequest $request){
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
            $this->finalQueryFilter->where("current_job",$request->current_job) : $this->finalQueryFilter;
        //ContractType
        $this->finalQueryFilter = !is_null($request->contract_type) ?
            $this->finalQueryFilter->where("contract_type",$request->contract_type) : $this->finalQueryFilter;
        //EducationLevel
        $this->finalQueryFilter = !is_null($request->education_level_id) ?
            $this->finalQueryFilter
                ->whereHas("education_data",function ($q)use($request){
                $q->where("id_ed_lev",$request->education_level_id);
            }) : $this->finalQueryFilter;
        //LanguageSkill
        $this->finalQueryFilter = !is_null($request->education_level_id) ?
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
                    $q->where("id",$request->position_id);
                }) : $this->finalQueryFilter;
        //Conference
        $this->finalQueryFilter = $this->CompareDateStatic($request->from_conference_date,$request->to_conference_date,
        "start_date","conferences");
        //Decision
        $this->finalQueryFilter = $this->CompareDateStatic($request->from_decision_date,$request->to_decision_date,
            "date","decision_employees");
        $this->finalQueryFilter = !is_null($request->type_decision_id) ?
            $this->finalQueryFilter
                ->whereHas("decision_employees",function ($q)use($request){
                    $q->where("type_decision_id",$request->type_decision_id);
                }) : $this->finalQueryFilter;
        //Salary
        $this->finalQueryFilter = !is_null($request->form_salary) && !is_null($request->to_salary) ?
            $this->finalQueryFilter->with("contract")
                ->whereHas("contract",function ($q) use ($request){
                    $q->whereBetween("salary",[$request->form_salary,$request->to_salary]);
                }) : $this->finalQueryFilter;
        dd($this->finalQueryFilter->get()->toArray());
    }

    private function CompareDateStatic($from_date,$to_date,$name_column,$relation = null){
        $compareTwoDate = [$from_date,$to_date];
        if (!is_null($from_date) && !is_null($to_date)){
            if (strtotime($from_date) <= strtotime($to_date)){
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
