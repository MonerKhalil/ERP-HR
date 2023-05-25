<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ReportEmployeeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "section_id" => ["nullable",Rule::exists("sections","id")],
            "education_level_id" => ["nullable",Rule::exists("education_levels","id")],
            "membership_type_id" => ["nullable",Rule::exists("membership_types","id")],
            "position_id" => ["nullable",Rule::exists("positions","id")],
            "type_decision_id" => ["nullable",Rule::exists("type_decisions","id")],
            "language_id" => ["nullable",Rule::exists("languages","id")],
            "language_read" => ["nullable",Rule::in(["Beginner","Intermediate","Advanced"])],
            "language_write" => ["nullable",Rule::in(["Beginner","Intermediate","Advanced"])],
            "gender" => ["nullable",Rule::in(["male","female"])],
            "family_status" => ["nullable",Rule::in(["married","divorced","single"])],
            "contract_type" => ['nullable', Rule::in(["permanent", "temporary"])],
            "current_job" => ["nullable","string"],
            "from_end_break_date" => $this->dateRules(false),
            "to_end_break_date" => $this->afterDateOrNowRules(false,"from_end_break_date"),
            "from_birth_date" => $this->dateRules(false),
            "to_birth_date" => $this->afterDateOrNowRules(false,"from_birth_date"),
            "from_contract_direct_date" => $this->dateRules(false),
            "to_contract_direct_date" => $this->afterDateOrNowRules(false,"from_contract_direct_date"),
            "from_conference_date" => $this->dateRules(false),
            "to_conference_date" => $this->afterDateOrNowRules(false,"from_conference_date"),
            "from_decision_date" => $this->dateRules(false),
            "to_decision_date" => $this->afterDateOrNowRules(false,"from_decision_date"),
            'form_salary' => ['nullable','numeric','min:1'],
            'to_salary' => ['nullable','numeric','min:'.$this->input('form_salary')],
            'salary' => ['nullable','numeric'],
        ];
    }
}
