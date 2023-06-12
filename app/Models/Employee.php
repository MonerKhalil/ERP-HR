<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Employee extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "user_id","section_id","nationality","first_name","last_name","father_name","mother_name"
        ,"NP_registration","birth_place","current_job","job_site"
        ,"number_national","number_file","number_insurance"
        ,"number_self","number_child","number_wives","gender"
        ,"reason_exemption","military_service","family_status","birth_date"
        ,"created_by", "updated_by", "is_active",
        "count_administrative_leaves","count_month_services"
        ,"work_setting_id",
    ];

    protected $appends = [
        "name",
    ];

    // Add relationships between tables section
    public function work_setting(){
        return $this->belongsTo(WorkSetting::class,"work_setting_id","id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function nationality_country(){
        return $this->belongsTo(Country::class,"nationality","id");
    }

    public function section()
    {
        return $this->belongsTo(Sections::class, "section_id", "id");
    }

    public function positions(){
        return $this->belongsToMany(Position::class,"position_employees"
            ,"employee_id"
            ,"position_id"
            ,"id"
            ,"id");
    }

    private function tempLeaves(string $type){
        return $this->hasMany(Leave::class,"employee_id","id")
            ->with("leave_type")
            ->where("status",$type);
    }

    public function leaves(){
        return $this->tempLeaves("approve");
    }

    public function leaves_pending(){
        return $this->tempLeaves("pending");
    }

    public function leaves_reject(){
        return $this->tempLeaves("reject");
    }

    public function data_end_service(){
        return $this->hasMany(DataEndService::class,"employee_id","id")
            ->where("is_request_end_services",false);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class, 'employee_id', 'id');
    }

    public function education_data()
    {
        return $this->hasMany(Education_data::class, 'employee_id', 'id');
    }

    public function conferences(){
        return $this->belongsToMany(Conference::class,"conference_employees"
            ,"employee_id"
            ,"conference_id"
            ,"id"
            ,"id")->with("address");
    }

    public function session_decision(){
        return $this->belongsToMany(SessionDecision::class,"member_session_decisions",
            "employee_id",
            "session_decision_id",
            "id",
            "id");
    }

    public function decision_employees(){
        return $this->belongsToMany(Decision::class,"employee_decisions",
            "employee_id",
            "decision_id",
            "id",
            "id")->with("type_decision");
    }

    public function getNameAttribute(){
        return $this->first_name . " " . $this->last_name;
    }

    public function contract(){

        return $this->hasMany(Contract::class,'employee_id','id')->orderBy("id","desc");
    }
    public function language_skill(){

        return $this->hasMany(Language_skill::class,'employee_id','id')->with("language");
    }
    public function membership(){
        return $this->hasMany(Membership::class,'employee_id','id');
    }
    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules()
    {
        return function (BaseRequest $validator) {
            $employee = is_null($validator->route("employee")) ? "" : $validator->route("employee")->id;
            $rule = $validator->isUpdatedRequest() ? "sometimes" : "required";
            return [
                "work_setting_id" => ["required", Rule::exists('work_settings', 'id')],
                "user_id" => [$rule,"numeric",Rule::exists("users","id"),
                !$validator->isUpdatedRequest() ? Rule::unique("employees","user_id")
                    : Rule::unique("employees","user_id")->ignore($employee)],
                "section_id" => ["required","numeric",Rule::exists("sections","id")],
                "nationality" => ["required","numeric",Rule::exists("countries","id")],
                "number_national" => ["required","numeric",
                !$validator->isUpdatedRequest() ? Rule::unique("employees","number_national")
                    : Rule::unique("employees","number_national")->ignore($employee)],
                "number_file" => ["required","numeric"],
                "number_insurance" => ["required","numeric"],
                "number_self" => ["required","numeric"],
                "first_name" => $validator->textRule(true),
                "last_name" => $validator->textRule(true),
                "father_name" => $validator->textRule(true),
                "mother_name" => $validator->textRule(true),
                "NP_registration" => $validator->textRule(true),
                "birth_place" => $validator->textRule(true),
                "current_job" => $validator->textRule(true),
                "job_site" => $validator->textRule(true),
                "gender" => ["required",Rule::in(["male","female"])],
                "military_service" => ["required",Rule::in(["exempt","performer","in_service"])],
                "reason_exemption" => [Rule::requiredIf(function ()use($validator){
                    return $validator->military_service === "exempt";
                })],
                "family_status" => ["required",Rule::in(["married","divorced","single"])],
                "number_wives" => ["numeric","min:1",Rule::requiredIf(function ()use($validator){
                    return $validator->family_status === "married" || $validator->family_status === "divorced";
                })],
                "number_child" => ["numeric",Rule::requiredIf(function ()use($validator){
                    return $validator->family_status === "married" || $validator->family_status === "divorced";
                })],
                "birth_date" => $validator->dateRules(true),
            ];
        };
    }
}
