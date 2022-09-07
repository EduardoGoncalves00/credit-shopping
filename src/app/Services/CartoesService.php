<?php

namespace App\Services;

use App\Models\Cartao;

class CartoesService
{
    public function buscaCartoes($withTrashed = false)
    {
        if ($withTrashed == true){
            return Cartao::withTrashed()->get();
        }

        return Cartao::all();
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
}
