<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAccessValidateRequest extends FormRequest
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
            'number_contract' => 'required|int|min:1|max:16',
            'date_from' => 'required|date',
            'date_to' => 'required|date'
        ];
    }
}
