<?php

namespace App\Http\Requests;



use App\Models\DocumentContact;

class DocumentContactRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $callback = (new DocumentContact)->validationRules();

        return $callback($this);
    }
}
