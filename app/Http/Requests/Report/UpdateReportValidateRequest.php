<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => 'string|min:3|max:150',
            'title' => 'required|string|min:3|max:150',
            'text' => 'required|string|min:10',
            'date' => 'required|date',
            'image' => 'image',
            'category_id' => 'required|integer|exists:App\Models\Report,category_id',
        ];
    }
}
