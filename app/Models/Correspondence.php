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
        "origin_number","number","origin_date","type","type_connection",
        "employee_id","section_id","subject","summary",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');


    }
    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id', 'id');
    }
    public function employees(){
        return $this->belongsToMany(Employee::class,"correspondence_source_dests",
            "correspondences_id",
            "employee_id",
            "id",
            "id");
    }
    public function sections(){
        return $this->belongsToMany(Sections::class,"correspondence_source_dests",
            "correspondences_id",
            "section_id",
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

            $ID = $validator->route('correspondences') ?? 0;
            return [
                "origin_number"=>['required', 'numeric'],
                "number"=>['required', 'numeric' ,Rule::unique('correspondences', 'number')->ignore($ID)],//
                "origin_date"=>['required','date'],
                "type"=>['required',Rule::in(['internal','external'])],
                "type_connection"=>[Rule::requiredIf(function ()use($validator){
                              return   $validator->type=="external";
                }),Rule::in(["email","fax","hand"])],
                "employee_id"=>[Rule::requiredIf(function ()use($validator){
                    return   $validator->type==="internal";
                }),Rule::exists("employees","id")],
                "section_id"=>[Rule::requiredIf(function ()use($validator){
                    return   $validator->type==="internal";
                }),Rule::exists("sections","id")],
                "subject"=>$validator->textRule(true),
                "summary"=>$validator->textRule(true),
                /////////////////
                "source_dest_type"=>["required",Rule::in(['outgoing','incoming','outgoing_to_incoming','incoming_to_outgoing'])],
               // "employee_id_current"=>["required",Rule::exists("employees","id")],
                //"section_id_current"=>["required",Rule::exists("sections","id")],
                "section_id_dest" => ["required", Rule::exists("sections", "id"),
                    function ($attribute, $value, $fail) {
                        $current_section_id = Employee::findOrFail(15)->section_id;
                        if ($value == $current_section_id) {
                            $fail('section_id_dest==current_section');
                        }
                    },
                ],
                "date" => ['required', 'date'],
            ];
        };
    }
}
