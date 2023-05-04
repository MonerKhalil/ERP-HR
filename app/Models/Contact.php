<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Contact extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "address_id","employee_id","work_number","address_details",
        "private_number","address_type","email",
        "created_by","updated_by","is_active",
    ];


    // Add relationships between tables section
    public function employee()
    {

        return $this->belongsTo(Employee::class, 'employee_id', 'id')
            ->withDefault();
    }
    public function address()
    {
        return $this->belongsTo(Address::class, "address_id", "id")
            ->with("country");
    }
    public function document_information()
    {
        $this->hasMany(Document_information::class,"contacts_id","id");
    }
    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            return [
                "address_id" => ['required', Rule::exists('addresses', 'id')],
                "employee_id"=> ['required', Rule::exists('employees', 'id')],
                "work_number"=> ['required','min:7', 'max:15' , Rule::unique('contacts', 'work_number')],
                "address_details"=>['nullable','string','min:7', 'max:80' ],
                "private_number"=>['required','min:7', 'max:15' , Rule::unique('contacts', 'private_number')],
                "address_type"=>['required', Rule::in(["house","clinic","office"])],
                "email"=>['required', 'string', 'email'],
               // "contacts_id"=>['required', Rule::exists('contacts', 'id')],
                "document_type"=>['required', Rule::in(["family_card","identification","passport"])],
                "document_number"=>['required','numeric','min:0', 'max:1000000'],
                "document_path"=>['required','array' ],
            ];
        };
    }

}
