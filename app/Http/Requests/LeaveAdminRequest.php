<?php

namespace App\Http\Requests;

use App\Models\LeaveType;
use Illuminate\Validation\Rule;

class LeaveAdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $leaveType = LeaveType::query()->find($this->input("leave_type_id"));
        $is_hourly = $leaveType->is_hourly ?? null;
        $max_hours = $leaveType->max_hours_per_day ?? null;
        return [
            "leave_type_id" => ["required",Rule::exists("leave_types","id")],
            "employee_ids" => ["required","array"],
            "employee_ids.*" => ["required",Rule::exists("employees","id")],
            "count_hours" => [Rule::requiredIf(function ()use($is_hourly){
                return $is_hourly;
            }),"numeric",!is_null($max_hours) ? "max:".$max_hours : "nullable",],
            "count_minutes" => ["sometimes","numeric","min:1"],
            "description" => ["nullable","string"],
            "from_date" => $this->dateRules(true),
            "to_date" => $this->afterDateOrNowRules(true,"from_date"),
        ];
    }
}
