<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => 'string|min:3|max:200',
            'title' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:10|max:600',
            'text' => 'required|string|min:10',
        ];
    }
}
