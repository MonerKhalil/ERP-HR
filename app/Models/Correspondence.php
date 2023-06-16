<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class Correspondence extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "employee_id","subject","number_external","number_internal",
        "number","origin_number","date",
        "type","summary","path_file",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function CorrespondenceDest()
    {
        return $this->hasMany(Correspondence_source_dest::class, 'correspondences_id', 'id');
    }

    public function employees(){
        return $this->belongsToMany(Employee::class,"correspondence_source_dests",
            "correspondences_id",
            "current_employee_id",
            "id",
            "id");
    }

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){

        return function (BaseRequest $validator) {
            $ID = $validator->route('correspondences')->id ?? 0;
            return [
                "number" => ['required', 'numeric' , Rule::unique('correspondences', 'number')->ignore($ID)],//
                "type"=>['required',Rule::in(self::type())],
                "subject"=>$validator->textRule(true),
                "summary"=>["required","string"],
                "date"=>$validator->dateRules(true),
                "path_file" => $validator->fileRules(false),
                "number_internal"=>["numeric",Rule::requiredIf(function ()use($validator){
                    return $validator->input("type") == "internal";
                })],
                "number_external"=>["numeric",Rule::requiredIf(function ()use($validator){
                return $validator->input("type") == "external";
            })],
            ];
        };
    }

    public static function type(){
        return ['internal','external'];
    }
}
