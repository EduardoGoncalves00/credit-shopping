<?php

namespace App\Services;

use App\Http\Requests\PuxarRelatorioRequest;
use App\Models\Cartao;
use Carbon\Carbon;

class CartoesService
{
    public function buscaCartoes($withTrashed = false)
    {
        if ($withTrashed == true){
            return Cartao::withTrashed()->get();
        }

        return Cartao::all();
    }

    public function criar()
    {
        return view('cartoes.criar');
    }

    public function criarCartao($request)
    {    
        $cartao = new Cartao;
        $cartao->nome = $request->input('nome');
        $cartao->dia_pagamento = $request->input('dia_pagamento');
        $cartao->dia_fechamento = $request->input('dia_fechamento');
        $cartao->banco = $request->input('banco');
        $cartao->save();
    }

    public function editar($id)
    {
        $cartao = Cartao::findOrFail($id);
        return view('cartoes.editar', ['cartao'=> $cartao]);
    }

    public function deletar($id)
    {
        Cartao::findOrFail($id)->delete();
    }
    
    public function atualizar($request)
    {
        Cartao::findOrFail($request->id)->update($request->all());
    }

    public function criarViewRelatorio()
    {
        $cartoes = Cartao::all();
        return view('compras.relatorios', ['cartoes'=> $cartoes]);
    }

    public function buscarFatura(PuxarRelatorioRequest $request)
    {
        $cartao = Cartao::findOrFail($request->cartao_id);
        $mesSelecionado = Carbon::createFromFormat('Y-m', $request->data)->format('m');
        $relatorio = $cartao->itensFatura($request->data);
        $total = $cartao->totalFatura($request->data);
        
        return view('compras.puxarRelatorio', [
                    'diaPagamento' => $cartao->dia_pagamento,
                    'somenteMesAtualSelecionado' => $mesSelecionado,
                    'somaFatura' => $total,
                    'relatorio' => $relatorio
                ]);
        // return ["Cartão selecionado" => $cartao, "Mês selecionado" => $mesSelecionado, "Valor total" => $total, $relatorio,];
    }
}
