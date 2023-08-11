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
        "current_employee_id", // the employee the corr is currently at
        "in_employee_id_dest", // the target employee TODO:: Modify to section
        "out_current_section_id", // the target section
        "out_section_id_dest",
        "is_done",
        "type", // internal or external
        "notice",
        "path_file",
         "source_dest_type", // out and in
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
    public function employee_dest()
    {
        return $this->belongsTo(Employee::class, 'in_employee_id_dest', 'id');
    }
    public function out_section_dest()
    {
        return $this->belongsTo(SectionExternal::class, 'out_section_id_dest', 'id');
    }
    public function out_section_current()
    {
        return $this->belongsTo(SectionExternal::class, 'out_current_section_id', 'id');
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
                "data.*.out_current_section_id" => [Rule::requiredIf(function ()use($correspondences){
                    return $correspondences->type == "external";
                }),Rule::exists("section_externals","id")],
                "data.*.in_employee_id_dest" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("type") != "external";
                }),Rule::exists("employees","id")],
                "data.*.out_section_id_dest" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("type") == "external";
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
