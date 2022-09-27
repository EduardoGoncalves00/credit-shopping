<?php

namespace App\Services;

use App\Http\Requests\PuxarRelatorioRequest;
use App\Models\Cartao;
use Carbon\Carbon;

class CartoesService
{
    public function index($withTrashed = true)
    {
        if ($withTrashed == true){
            return Cartao::withTrashed()->get();
        }

        return Cartao::all();
    }

    public function store($request)
    {    
        $cartao = new Cartao;
        $cartao->nome = $request->input('nome');
        $cartao->dia_pagamento = $request->input('dia_pagamento');
        $cartao->dia_fechamento = $request->input('dia_fechamento');
        $cartao->banco = $request->input('banco');
        $cartao->save();
    }

    public function edit($id)
    {
        $cartao = Cartao::findOrFail($id);
        return view('cartoes.editar', ['cartao'=> $cartao]);
    }

    public function destroy($id)
    {
        Cartao::findOrFail($id)->delete();
    }
    
    public function update($request)
    {
        Cartao::findOrFail($request->id)->update($request->all());
    }

    public function showInvoiceSearch()
    {
        $cartoes = Cartao::all();
        return view('compras.relatorios', ['cartoes'=> $cartoes]);
    }

    public function showInvoice($request)
    {
        $cartao = Cartao::findOrFail($request->cartao_id);
        return [
            'diaPagamento' => $cartao->dia_pagamento,
            'somenteMesAtualSelecionado' => Carbon::createFromFormat('Y-m', $request->data)->format('m'),
            'fatura' => $cartao->itensFatura($request->data),
            'totalFatura' => $cartao->totalFatura($request->data),
        ];
    }
}
