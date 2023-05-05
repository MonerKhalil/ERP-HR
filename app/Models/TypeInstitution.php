<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use App\Rules\TextRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class TypeInstitution extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "name",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function institution(){
        return $this->hasMany(Institution::class,"type_institution_id","id");
    }

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            $rules['name'] = [new TextRule(),Rule::unique("type_institutions","name")];
            $rules['name'][] =  $validator->isUpdatedRequest() ? 'required' : 'sometimes';
            return $rules;
        };
    }
}
