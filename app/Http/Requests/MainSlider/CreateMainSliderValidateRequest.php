<?php

namespace App\Http\Requests\MainSlider;

use Illuminate\Foundation\Http\FormRequest;

class CreateMainSliderValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:10|max:350',
            'position' => 'required|integer|min:0',
            'link' => 'string|nullable|min:10',
        ];
    }
}
