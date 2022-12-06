<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarComprasRequest extends FormRequest
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
            'descricao' => 'required',
            'categoria_id' => 'required', 
            'valor' => 'required|numeric',
            'parcela' => 'required|numeric|min:1',
            'cartao_id' => 'required',
            'data' => 'required',
            'usuario' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'categoria_id.required' => 'O campo categoria é obrigatório o preenchimento.',
            'descricao.required' => 'O campo descrição é obrigatório o preenchimento.',
            'valor.required' => 'O campo valor é obrigatório o preenchimento.',
            'valor.numeric' => 'O valor deve ser um número.',
            'parcela.required' => 'O campo parcela é obrigatório o preenchimento.',
            'parcela.numeric' => 'O campo parcela deve ser um número maior que zero.',
            'parcela.numeric' => 'O campo parcela deve ser um número maior que zero.',
            'parcela.min' => 'O campo parcela deve ser um número maior que zero.',
            'cartao_id.required' => 'O campo cartão é obrigatório o preenchimento.',
            'data.required' => 'O campo data é obrigatório o preenchimento.',
            'usuario.required' => 'O campo usuário é obrigatório o preenchimento.',
        ];
    }
}
