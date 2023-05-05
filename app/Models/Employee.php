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
        "user_id", "section_id", "number_national", "first_name", "last_name", "gender",
        "father_name", "mother_name", "nationality", "NP_registration", "birth_place", "birth_date",
        "created_by", "updated_by", "is_active",
        "number_wives", "number_child", "current_job",
        "number_self", "military_service", "family_status",
        "Number_insurance", "job_site", "number_file"
    ];

    // Add relationships between tables section

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'employee_id', 'id');
    }

    public function session_decision(){
        return $this->belongsToMany(SessionDecision::class,"member_session_decisions",
            "employee_id",
            "session_decision_id",
            "id",
            "id");
    }

    public function education_data()
    {
        return $this->hasMany(Education_data::class, 'employee_id', 'id');
    }
    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules()
    {
        return function (BaseRequest $validator) {
            $userCurrentId = $validator->route('employee')->user_id ?? auth()->id();
            $EmployeeId = $validator->route('employee')->id ?? auth()->id();
            $object_rules = [
                "file" => $validator->imageRule(true),
                "document_type" => [Rule::in(["family_card", "identification", "passport"])],
                "document_number" => ['numeric', 'min:0', 'max:1000000'],];
            $rule = $validator->isUpdatedRequest();
            $rules = [
                'user_id' => ['required', Rule::exists('users', 'id')],
                // 'section_id' => ['required', /*Rule::exists('addresses', 'id')*/],
                'first_name' => $validator->textRule(true),
                'last_name' => $validator->textRule(true),
                "gender" => ['required', Rule::in(['male', 'female'])],
                "father_name" => $validator->textRule(true),
                "mother_name" => $validator->textRule(true),
                "nationality" => $validator->textRule(true),
                "NP_registration" => $validator->textRule(true),
                "birth_place" => $validator->textRule(true),
                "birth_date" => $validator->dateRules(true),
                "is_active" => ['boolean'],
                "number_wives" => ['numeric', 'min:0', 'max:8'],
                "number_child" => ['numeric', 'min:0', 'max:75'],
                "current_job" => $validator->textRule(true),
                "military_service" => ['required', 'in:exempt,performer,in_service',/* Rule::in(["exempt", "performer", "in_service"])*/],
                "family_status" => ['required', 'in:married,divorced,single'  /* Rule::in(["married", "divorced", "single"])*/],
                "number_national" => ['required', 'numeric', 'digits:11', Rule::unique('employees', 'number_national',)->ignore($userCurrentId, "user_id")],
                "Number_insurance" => ['required', 'numeric', 'digits:11', Rule::unique('employees', 'Number_insurance')->ignore($userCurrentId, "user_id")],
                "number_self" => ['required', 'numeric', 'min:3', 'max:100000', Rule::unique('employees', 'number_self',)->ignore($userCurrentId, "user_id")],
                "number_file" => ['required', 'numeric', 'min:0', 'max:1000000'],
                "job_site" => $validator->textRule(true),

                "address_id" => ['required', Rule::exists('addresses', 'id')],
                "address_details" => ['nullable', 'string', 'min:7', 'max:80'],
                "address_type" => ['required', Rule::in(["house", "clinic", "office"])],
                "email" => ['required', 'string', 'email'],
//                "document_path" => ['required', 'array'],

                "id_ed_lev"=>['required', Rule::exists('education_levels', 'id')],
                "grant_date"=>['required', 'date'],
                "college_name"=>$validator->textRule(true),

                "amount_impact_salary"=>['numeric', 'min:0', 'max:100'],
//                "document_education_path"=>["required","array"],
//                "document_education_path.*"=>$validator->imageRule(true),



//                "document_path" => "required|array",
////                "document_path.*.file" => $validator->imageRule(true),
//                "document_path.*.document_type" => [Rule::in(["family_card", "identification", "passport"])],
//                "document_path.*.document_number" => ['numeric', 'min:0', 'max:1000000'],
            ];


            $rules["work_number"] = $rule ? ['required', 'min:7', 'max:15', Rule::unique('contacts', 'work_number')->ignore($EmployeeId)] :
                ['required', 'min:7', 'max:15', Rule::unique('contacts', 'work_number')];
            $rules["private_number"] = $rule ? ['required', 'min:7', 'max:15', Rule::unique('contacts', 'private_number')->ignore($EmployeeId)] :
                ['required', 'min:7', 'max:15', Rule::unique('contacts', 'private_number')];


            return $rules;
        };
    }
}
