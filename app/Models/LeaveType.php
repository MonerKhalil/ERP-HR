<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use App\Rules\TextRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class LeaveType extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "name","type_effect_salary","rate_effect_salary","gender","max_days_per_years",
        "max_days_per_month","years_employee_services","leave_limited","is_hourly","max_hours_per_day",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function employees(){
        return $this->belongsToMany(Employee::class,"leaves"
            ,"leave_type_id"
            ,"employee_id"
            ,"id"
            ,"id");
    }

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            $current = $validator->route("leave_type")->id ?? "";
            return [
                "name" => !$validator->isUpdatedRequest() ? [
                    "required",new TextRule(),"string","min:1","max:255",Rule::unique("leave_types"),
                ] : [
                    "sometimes",new TextRule(),"string","min:1","max:255",Rule::unique("leave_types","name")->ignore($current),
                ],
                "type_effect_salary" => ["required",Rule::in(self::type_effect_salary())],
                "rate_effect_salary" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("type_effect_salary")=="effect_salary";
                }),"numeric","min:1","max:100"],
                "gender" => ["required",Rule::in(self::gender())],
                "is_hourly" => ["required","boolean"],
                "max_hours_per_day" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("is_hourly") == "true" || $validator->input("is_hourly") == 1;
                }),"numeric"],
                "leave_limited" => ["required","boolean"],
                "max_days_per_month" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("leave_limited") == "true" || $validator->input("leave_limited") == 1;
                }),"numeric"],
                "max_days_per_years" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("leave_limited") == "true" || $validator->input("leave_limited") == 1;
                }),"numeric"],
                "years_employee_services" => ["required","numeric","min:0"],
            ];
        };
    }

    public static function type_effect_salary(){
        return  ["unpaid","paid","effect_salary"];
    }

    public static function gender(){
        return ["male","female","any"];
    }
}
