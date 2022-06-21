<?php

namespace App\Http\Requests\Published;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePublicationValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'description' => 'required|string|min:10|max:400',
            'link' => 'required|string|min:10',
            'date' => 'required|string'
        ];
    }
}
