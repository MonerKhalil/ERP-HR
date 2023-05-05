<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberSessionDecision extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
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
            return [
                //Rules
            ];
        };
    }
}
