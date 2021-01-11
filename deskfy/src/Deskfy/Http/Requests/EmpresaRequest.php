<?php

namespace Deskfy\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use Illuminate\Validation\Rule;

class EmpresaRequest extends FormRequest
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
            'codigo' => ['required', Rule::unique('empresas')->ignore(optional(request('empresa'))->id)], 
            'titulo' => 'required', 
            'documento' => ['required', Rule::unique('empresas')->ignore(optional(request('empresa'))->id)], 
            'cep' => 'required', 
            'endereco' => 'required', 
            'bairro' => 'required', 
            'cidade' => 'required', 
            'estado' => 'required', 
            'email' => 'required|email', 
            'telefone' => 'required', 
        ];
    }
}
