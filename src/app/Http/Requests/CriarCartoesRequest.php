<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarCartoesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'dia_pagamento' => 'required|numeric',
            'dia_fechamento' => 'required|numeric',
            'banco' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório o preenchimento.',
            'dia_pagamento.required' => 'O campo dia de pagamento é obrigatório o preenchimento.',
            'dia_pagamento.numeric' => 'O campo dia de pagamento deve ser um número.',
            'dia_fechamento.required' => 'O campo dia de fechamento é obrigatório o preenchimento.',
            'dia_fechamento.numeric' => 'O campo dia de fechamento deve ser um número.',
            'banco.required' => 'O campo banco é obrigatório o preenchimento.',
        ];
    }
}
