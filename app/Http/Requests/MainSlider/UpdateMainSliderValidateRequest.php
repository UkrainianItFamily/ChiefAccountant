<?php

namespace App\Http\Requests\MainSlider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMainSliderValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:main_sliders|exists:App\Models\MainSlider,id',
            'title' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:10|max:350',
            'position' => 'required|integer|min:0',
            'link' => 'string|nullable|min:10',
        ];
    }
}
