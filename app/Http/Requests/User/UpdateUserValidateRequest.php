<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:App\Models\User,id',
            'name' => 'required|string|min:2|max:16|alpha',
            'surname' => 'required|string|min:2|max:16|alpha',
            'phone' => 'string|numeric|min:4|nullable',
            'company_code' => 'nullable|integer|min:4',
            'company_name' => 'nullable|string|min:2|max:25|alpha',
            'company_id' => 'nullable|integer',
            'password' => 'required|string|min:8|max:16',
            'entrepreneurial_activity' => 'required|int'
        ];
    }
}
