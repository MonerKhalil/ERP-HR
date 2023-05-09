<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class Document_information extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        #Add Attributes
        "contacts_id","document_type","document_number",
        "document_path",
        "created_by","updated_by","is_active",
    ];


//
    // Add relationships between tables section
    public function contact(){
        $this->belongsTo(Contact::class,"id_education","id" );
    }
    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */

    public function validationRules(){
        return function (BaseRequest $validator) {
            return [
                "contacts_id"=>['required', Rule::exists('contacts', 'id')],
                "document_type"=>['required', Rule::in(["family_card","identification","passport"])],
                "document_number"=>['required','numeric','min:0', 'max:1000000'],
                "document_path"=>['required','array' ],
            ];
        };
    }
}
