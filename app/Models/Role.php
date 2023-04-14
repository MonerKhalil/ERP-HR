<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Role extends \Spatie\Permission\Models\Role
{
    /**
     * Description: To check front end validation
     * @inheritDoc
     */
    public function validationRules(){
        return function (BaseRequest $validator) {
            $rules = [
                'name' => ['required',Rule::unique("roles","name")],
                'permissions' => 'required|array',
                'permissions.id' => 'required|array',
            ];
            if ($validator->isUpdatedRequest()){
                $rules['name'] =  ["required",Rule::unique("roles","name")->ignore($validator->route('role')->id)];
            }
            return $rules;
        };
    }
}