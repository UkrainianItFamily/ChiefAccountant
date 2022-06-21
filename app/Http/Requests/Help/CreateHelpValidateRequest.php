<?php

namespace App\Http\Requests\Help;

use Illuminate\Foundation\Http\FormRequest;

class CreateHelpValidateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:10',
            'categoryId' => 'required|integer',
        ];
    }
}
