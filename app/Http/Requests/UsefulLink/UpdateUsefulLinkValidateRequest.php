<?php

namespace App\Http\Requests\UsefulLink;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsefulLinkValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:useful_links|exists:App\Models\UsefulLink,id',
            'title' => 'required|string|min:3|max:150',
            'link' => 'required|string|min:10',
        ];
    }
}
