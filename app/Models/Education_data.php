<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class Education_data extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "created_by","updated_by",
        "employee_id","id_ed_lev","grant_date",
        "college_name","amount_impact_salary",
    ];
    // Add relationships between tables section
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id')
            ->withDefault();
    }
    public function document_education()
    {
        $this->hasMany(Document_education::class,"id_education","id");
    }

    public function Education_level()
    {
        $this->belongsTo(Education_level::class,"id_ed_lev","id") ->withDefault();;
    }

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            return [
                "employee_id"=> ['required', Rule::exists('employees', 'id')],
                "id_ed_lev"=>['required', Rule::exists('education_levels', 'id')],
                "grant_date"=>['required', 'date'],
                "college_name"=>['required', 'string', 'min:3', 'max:255',],
                "amount_impact_salary"=>['numeric', 'min:0', 'max:1000000'],
                "document_education_path"=>['required','array' ]
            ];
        };
    }
}
