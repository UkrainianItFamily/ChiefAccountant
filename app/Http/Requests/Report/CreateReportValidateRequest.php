<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class CreateReportValidateRequest extends FormRequest
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
            'text' => 'required|string|min:10',
            'date' => 'required|date',
            'image' => 'image',
            'category_id' => 'required|string|exists:App\Models\Report,category_id',
        ];
    }
}
