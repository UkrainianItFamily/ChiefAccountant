<?php

namespace App\Http\Requests\HelpCategories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHelpCategoryValidateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:help_categories',
            'title' => 'required|string|min:3|max:150',
            'slug' => 'required|string|min:3|max:150',
        ];
    }
}
