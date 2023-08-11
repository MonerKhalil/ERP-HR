<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class Correspondence_source_dest extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "correspondences_id",
        "current_employee_id",
        "external_party_id",
        "internal_department_id",
        "is_done",
        "type","notice","path_file",
         "source_dest_type",
        //////legal section
        "legal_opinion","path_file_legal_opinion","is_legal",
        /////////////
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section
    public function employee_current()
    {
        return $this->belongsTo(Employee::class, 'current_employee_id', 'id');
    }

    public function external_party()
    {
        return $this->belongsTo(SectionExternal::class, 'external_party_id', 'id');
    }
    public function internal_department()
    {
        return $this->belongsTo(Sections::class, 'internal_department_id', 'id');
    }
    public function correspondence()
    {
        return $this->belongsTo(Correspondence::class, 'correspondences_id', 'id');
    }

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            $correspondences = Correspondence::query()->find($validator->input("correspondences_id"));
            return [
                "correspondences_id"=>["required",Rule::exists("correspondences","id")],
                "type" => ["required", Rule::in(Correspondence::type())],
                "source_dest_type" => ["required",Rule::in(self::source_dest_type())],
                "is_done"=>["sometimes","boolean",],
                "data" => ["required","array"],
                "data.*" => ["required","array"],
                "data.*.current_employee_id" => ["required",Rule::exists("employees","id")],

                "data.*.external_party_id" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("type") == "external";///check
                }),Rule::exists("sections","id")],
                "data.*.internal_department_id" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("type") == "internal";
                }),Rule::exists("section_externals","id")],

                "notice"=>["nullable",$validator->textRule(false)],
                "path_file" =>["nullable" ,$validator->fileRules(false)],
                //////legal section
                "legal_opinion"=>["nullable",$validator->textRule(false)]
                ,"path_file_legal_opinion" =>["nullable" ,$validator->fileRules(false)],
                "is_legal"=>["nullable",Rule::in(["legal","illegal"]) ],
            ];
        };
    }
    public static function source_dest_type(){
        return ['outgoing','incoming','outgoing_to_incoming','incoming_to_outgoing'];
    }
}
