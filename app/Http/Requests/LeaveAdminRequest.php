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
        if (!$this->isUpdatedRequest()){
            return  [
                "leave_type_id" => ["required",Rule::exists("leave_types","id")],
                "employee_ids" => ["required","array"],
                "employee_ids.*" => ["required",Rule::exists("employees","id")],
                "from_hour" => [Rule::requiredIf(function ()use($is_hourly){
                    return $is_hourly;
                }),"date_format:g:i:s,g:i,g:i:s A,g:i A,H:i:s,H:i,H:i:s A,H:i A"],
                "to_hour" => [Rule::requiredIf(function (){
                    return !is_null($this->input("from_hour"));
                }),"after:from_hour","date_format:g:i:s,g:i,g:i:s A,g:i A,H:i:s,H:i,H:i:s A,H:i A"],
                "description" => ["nullable","string"],
                "from_date" => $this->dateRules(true),
                "to_date" => $this->afterDateOrNowRules(true,"from_date"),
            ];
        }
        return [
            "leave_type_id" => ["required",Rule::exists("leave_types","id")],
            "from_hour" => [Rule::requiredIf(function ()use($is_hourly){
                return $is_hourly;
            }),"date_format:g:i:s,g:i,g:i:s A,g:i A,H:i:s,H:i,H:i:s A,H:i A"],
            "to_hour" => [Rule::requiredIf(function (){
                return !is_null($this->input("from_hour"));
            }),"after:from_hour","date_format:g:i:s,g:i,g:i:s A,g:i A,H:i:s,H:i,H:i:s A,H:i A"],
            "description" => ["nullable","string"],
            "from_date" => $this->dateRules(true),
            "to_date" => $this->afterDateOrNowRules(true,"from_date"),
        ];
    }
}
