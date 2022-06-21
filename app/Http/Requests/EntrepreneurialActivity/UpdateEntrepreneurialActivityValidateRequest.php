<?php

namespace App\Http\Requests\EntrepreneurialActivity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEntrepreneurialActivityValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|int|exists:App\Models\EntrepreneurialActivity,id',
            'name' => 'required|string|min:2|max:100'
        ];
    }
}
