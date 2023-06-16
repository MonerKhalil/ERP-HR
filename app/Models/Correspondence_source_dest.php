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
        "correspondences_id","current_employee_id","out_current_section_id",
        "in_section_id_dest", "out_section_id_dest", "source_dest_type",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function employee_dest()
    {
        return $this->belongsTo(Employee::class, 'in_employee_id_dest', 'id');
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
                "data.*.current_employee_id" => ["required",Rule::exists("correspondences","id")],
                "data.*.out_current_section_id" => [Rule::requiredIf(function ()use($correspondences){
                    return $correspondences->type == "external";
                }),Rule::exists("section_externals","id")],
                "data.*.in_employee_id_dest" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("type") != "external";
                }),Rule::exists("employees","id")],
                "data.*.out_section_id_dest" => [Rule::requiredIf(function ()use($validator){
                    return $validator->input("type") == "external";
                }),Rule::exists("section_externals","id")],
            ];
        };
    }
    public static function source_dest_type(){
        return ['outgoing','incoming','outgoing_to_incoming','incoming_to_outgoing'];
    }
}
