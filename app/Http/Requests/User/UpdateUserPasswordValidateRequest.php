<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordValidateRequest extends FormRequest
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
            'old_password' => 'required|string|min:8|max:16|',
            'new_password' => 'required|confirmed|min:8|max:16required_with_all:old_password'
        ];
    }
}
