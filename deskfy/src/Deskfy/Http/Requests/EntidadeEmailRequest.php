<?php

namespace Deskfy\Http\Requests;

use Deskfy\Models\Entidade;
use Illuminate\Foundation\Http\FormRequest as FormRequest;
use Illuminate\Validation\Rule;

class EntidadeEmailRequest extends FormRequest
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
            'valor' => 'required|email'
        ];
    }
}
