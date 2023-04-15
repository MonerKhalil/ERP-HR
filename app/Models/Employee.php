<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "user_id","address_id","address_details","national_number","first_name","last_name","gender",
        "father_name","mother_name","nationality","NP_registration","id_barcode","birth_place","birth_date",
        "created_by","updated_by","is_active",
    ];

    // Add relationships between tables section

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function address(){
        return $this->belongsTo(Address::class,"address_id","id")
            ->with("country");
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
