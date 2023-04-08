<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreContactSiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cep' => 'required|max:25',
            'address' => 'required|max:256',
            'email' => 'email|required|max:256',
            'creci' => 'required|max:25',
            'cnpj' => 'required|max:50'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'cep.required' => 'O CEP é obrigatório',
            'address.required' => 'O Logradouro é obrigatório',
            'email.required' => 'O E-mail é obrigatório',
            'creci.required' => 'O CRECI é obrigatório',
            'cnpj.required' => 'O CNPJ é obrigatório'   
        ];
    }

}
