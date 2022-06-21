<?php


namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserByAdminValidateRequest  extends FormRequest
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
            'is_admin' => 'required|integer',
            'password' => 'nullable|confirmed|min:6',
            'email' => 'required|email'
        ];
    }
}
