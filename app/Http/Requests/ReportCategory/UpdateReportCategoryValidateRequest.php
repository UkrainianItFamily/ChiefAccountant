<?php

namespace App\Http\Requests\ReportCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportCategoryValidateRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:150',
            'parentCategoryId' => 'integer',
        ];
    }
}
