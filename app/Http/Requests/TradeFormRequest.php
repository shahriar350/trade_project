<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TradeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date',
            'trade_code' => 'required',
            'high' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'low' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'open' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'close' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'volume' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        ];
    }
    public function messages()
    {
        return [
            'high.regex' => 'Number must be 100.12, 10.1 format.',
            'low.regex' => 'Number must be 100.12, 10.1 format.',
            'open.regex' => 'Number must be 100.12, 10.1 format.',
            'close.regex' => 'Number must be 100.12, 10.1 format.',
            'volume.regex' => 'Number must be 100.12, 10.1 format.',
        ];
    }
}
