<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class TypeDecision extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "name",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            $current = $validator->route("type_decision")->id ;
            return [
                "name" => !$validator->isUpdatedRequest() ? [
                    "required",Rule::unique("type_decisions"),
                ] : [
                    "sometimes",Rule::unique("type_decisions","name")->ignore($current),
                ]
            ];
        };
    }
}
