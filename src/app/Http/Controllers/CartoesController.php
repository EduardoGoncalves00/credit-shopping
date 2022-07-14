<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartao;

class CartoesController extends Controller
{
    public function store(Request $request){
        
        $cartao = new Cartao;
        $cartao->nome = $request->input('nome');
        $cartao->dia_pagamento = $request->input('dia_pagamento');
        $cartao->dia_fechamento = $request->input('dia_fechamento');
        $cartao->banco = $request->input('banco');
        $cartao->save();

        return response()->json('sucesso! cartao criado.');
    }

    public function index(){

        $cartoes = Cartao::all();
        return view('cartoes.index', ['cartoes'=> $cartoes]);
    }
}
