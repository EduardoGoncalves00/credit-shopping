<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartao;
use Carbon\Carbon;

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

    public function indexparaform(){
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

    public function criarViewRelatorio()
    {
        $cartoes = Cartao::all();
        return view('compras.relatorios', ['cartoes'=> $cartoes]);
    }

    public function retornarcartoes()
    {
        $aa = Cartao::all();
        return view('compras.index', ['aa'=> $aa]);
    }

    public function buscarFatura(Request $request)
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
