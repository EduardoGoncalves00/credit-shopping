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

        return redirect('cartoes');
    }

    public function criar(){
        return view('cartoes.criar');
    }

    public function index(){
        $cartoes = Cartao::all();
        return view('cartoes.index', ['cartoes'=> $cartoes]);
    }

    public function deletar($id){
        Cartao::findOrFail($id)->delete();

        return redirect('cartoes');
    }

    public function editar($id){
        $cartao = Cartao::findOrFail($id);

        return view('cartoes.editar', ['cartao'=> $cartao]);
    }

    public function atualizar(Request $request) {
        Cartao::findOrFail($request->id)->update($request->all());

        return redirect('cartoes');
    }

    // public function editar($id){
    //     $cartao = Cartao::findOrFail($id);

    //     return view('cartoes.editar', ['cartao'=> $cartao]);
    // }

    // public function atualizar(Request $request, $id){
    //     $cartao = Cartao::findOrFail($id);
    //     $cartao->nome = $request->input('nome');
    //     $cartao->dia_pagamento = $request->input('dia_pagamento');
    //     $cartao->dia_fechamento = $request->input('dia_fechamento');
    //     $cartao->banco = $request->input('banco');
    //     $cartao->update();

    //     return redirect('cartoes');
    // }
}
