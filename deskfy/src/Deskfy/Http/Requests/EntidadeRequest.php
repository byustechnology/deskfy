<?php

namespace Deskfy\Http\Requests;

use Deskfy\Models\Entidade;
use Illuminate\Foundation\Http\FormRequest as FormRequest;
use Illuminate\Validation\Rule;

class EntidadeRequest extends FormRequest
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
            'tipo' => ['required', Rule::in(array_keys(Entidade::TIPOS))], 
            'codigo' => ['required', Rule::unique('entidades')->ignore(optional(request('entidade'))->id)], 
            'titulo' => 'required', 
            'documento' => ['required', Rule::unique('entidades')->ignore(optional(request('entidade'))->id)], 
            'responsavel' => 'required', 
            'cep' => 'required', 
            'endereco' => 'required', 
            'bairro' => 'required', 
            'cidade' => 'required', 
            'estado' => 'required'
        ];
    }
}
