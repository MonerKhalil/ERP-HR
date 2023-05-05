<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Institution extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "type_institution_id","address_id","address_details","name","description"
        ,"image","date_created",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function type_institution(){
        return $this->belongsTo(TypeInstitution::class,"type_institution_id","id");
    }

    public function address(){
        return $this->belongsTo(Address::class,"address_id","id");
    }

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            return [
                "type_institution_id" => ["required", Rule::exists("type_institutions","id")],
                "address_id" => ["required", Rule::exists("address_id","id")],
                "name" => $validator->textRule(true,null,3,255),
                "address_details" => $validator->textRule(false,null,3,255),
                "description" => $validator->textRule(false,true),
                "date_created" => $validator->dateRules(false),
                "image" => $validator->imageRule(false),
            ];
        };
    }
}
