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
        "source_dest_type","employee_id","section_id","section_id_dest","data","correspondences_id",
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
    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            return [
                "source_dest_type"=>["required",Rule::in(['outgoing','incoming','outgoing_to_incoming','incoming_to_outgoing'])],
                "employee_id"=>["required",Rule::exists("employees","id")],
                "section_id"=>["required",Rule::exists("sections","id")],
                "section_id_dest"=>["required",Rule::exists("sections","id")],
                "data" => ['required', 'date'],
                "correspondences_id"=>["required",Rule::exists("correspondences","id")  ]
                ];
        };
    }
}
