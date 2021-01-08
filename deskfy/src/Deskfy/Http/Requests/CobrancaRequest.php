<?php

namespace Deskfy\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use Illuminate\Validation\Rule;

class CobrancaRequest extends FormRequest
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
            'titulo' => 'required', 
            'descricao' => 'required', 
            'valor' => 'required|numeric', 
            'vence_em' => 'required|date|after_or_equal:now', 
        ]
    }
}
