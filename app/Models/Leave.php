<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "employee_id","leave_type_id"
        ,"from_date","to_date", "count_days",
        "count_hours","count_minutes",
        "description","status","reject_details",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function leave_type(){
        return $this->belongsTo(LeaveType::class,"leave_type_id","id");
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

            ];
        };
    }
}
