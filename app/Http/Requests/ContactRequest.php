<?php

namespace App\Http\Requests;

use App\Models\Contact;


class ContactRequest extends BaseRequest
{
    public function rules()
    {
        $callback = (new Contact)->validationRules();

        return $callback($this);

    }

//    public function messages()
//    {
//        return [
//            'private_number.unique' => 'This private_number is already exists!',
//            'work_number.unique' => 'This work_number is already exists!',
//            'address_id.exists'=>'This address_id not  exists!',
//            'employee_id.exists'=>'This employee_id not  exists!'
//        ];
//    }
}





