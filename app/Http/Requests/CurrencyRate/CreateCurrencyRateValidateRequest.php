<?php

namespace App\Http\Requests\CurrencyRate;

use Illuminate\Foundation\Http\FormRequest;

class CreateCurrencyRateValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'usd' => 'required|numeric',
            'rub' => 'required|numeric',
            'eur' => 'required|numeric',
            'date' => 'required|date|date_format:Y-m-d',
        ];
    }
}
