<?php

namespace App\Http\Requests;

use App\Models\TypeDecision;

class TypeDecisionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $callback = (new TypeDecision)->validationRules();

        return $callback($this);
    }
}
