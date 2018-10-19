<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


// para cada formulario diferente tenho que criar uma validation para poder dar certo
class MoneyValidationFormRequest extends FormRequest
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
            //
          'amount' => 'required|numeric'
        ];
    }
}
