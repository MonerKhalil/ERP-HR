<?php

namespace App\Http\Requests;

use App\Models\Institution;

class InstitutionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $callback = (new Institution)->validationRules();

        return $callback($this);
    }
}
