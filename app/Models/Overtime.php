<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Overtime extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "employee_id","overtime_type_id"
        ,"from_date","to_date","count_days"
        ,"from_time","to_time","count_hours_in_days","is_hourly",
        "description","status","reject_details","date_update_status",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function overtime_type(){
        return $this->belongsTo(OvertimeType::class,"overtime_type_id","id");
    }

    public function employee(){
        return $this->belongsTo(Employee::class,"employee_id","id");
    }

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            return [
                "overtime_type_id" => ["required",Rule::exists("overtime_types","id")],
                "description" => ["nullable","string"],
                "from_date" => $this->dateRules(true),
                "to_date" => $this->afterDateOrNowRules(true,"from_date"),
            ];
        };
    }
}
