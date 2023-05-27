<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sections extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "address_id" ,"name","details",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function contracts(){
        return $this->hasMany(Contract::class,"section_id","id");

    }
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
