<?php

namespace App\Http\Requests;

use App\Models\EmployeeDecision;

class EmployeeDecisionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $callback = (new EmployeeDecision)->validationRules();

        return $callback($this);
    }
}
