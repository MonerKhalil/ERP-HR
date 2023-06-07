<?php

namespace App\Http\Requests;

use App\Models\LeaveRequest;

class LeaveRequestRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $callback = (new LeaveRequest)->validationRules();

        return $callback($this);
    }
}
