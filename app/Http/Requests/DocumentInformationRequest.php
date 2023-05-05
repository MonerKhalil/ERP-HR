<?php

namespace App\Http\Requests;

use App\Models\Document_information;


class DocumentInformationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $callback = (new Document_information)->validationRules();

        return $callback($this);
    }
}
