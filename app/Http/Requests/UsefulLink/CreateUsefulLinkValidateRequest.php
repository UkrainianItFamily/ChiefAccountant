<?php

namespace App\Http\Requests\UsefulLink;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsefulLinkValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:150',
            'link' => 'required|string|min:10',
        ];
    }
}
