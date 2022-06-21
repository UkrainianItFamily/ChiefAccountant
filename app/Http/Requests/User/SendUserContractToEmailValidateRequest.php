<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SendUserContractToEmailValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|int|exists:App\Models\User,id',
            'description' => 'required|string|min:2|max:2000',
            'upload' => 'required|file|mimes:docx,pdf',
        ];
    }
}
