<?php

namespace App\Http\Requests\HelpCategories;

use Illuminate\Foundation\Http\FormRequest;

class CreateHelpCategoryValidateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:150',
        ];
    }
}
