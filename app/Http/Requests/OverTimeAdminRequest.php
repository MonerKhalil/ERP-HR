<?php

namespace App\Http\Requests;

use App\Models\{{ model }};

class OverTimeAdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $callback = (new {{ model }})->validationRules();

        return $callback($this);
    }
}
