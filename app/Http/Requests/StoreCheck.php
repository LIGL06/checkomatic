<?php

namespace CheckoMatic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreCheck extends FormRequest
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
            'bank' => 'bail|required',
            'recipient' => 'required',
            'amount' => 'required',
            'validUntil' => 'required',
        ];
    }
     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'bank.required' => 'Nombre del banco requerido',
            'recipient.required'  => 'Beneficiaro requerido',
            'amount.required' => 'Cantidad requerida',
            'validUntil.required' => 'Fecha de vencimiento requerida',
        ];
    }
}
