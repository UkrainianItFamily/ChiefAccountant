<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:16|alpha',
            'surname' => 'required|string|min:2|max:16|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|max:16|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'is_entity' => 'nullable|boolean',
            'company_name' => 'string|min:3|nullable',
            'phone' => 'string|numeric|min:4|nullable',
            'company_address' => 'string|min:3|max:300|nullable',
            'company_id' => 'integer|numeric|nullable',
            'company_code' => 'string|numeric|nullable',
            'license' => 'boolean|required'
        ];
    }
}
