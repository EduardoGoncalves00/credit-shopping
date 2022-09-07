<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarCartoesRequest;
use App\Http\Requests\CriarCartoesRequest;
use App\Http\Requests\PuxarRelatorioRequest;
use Illuminate\Http\Request;
use App\Models\Cartao;
use App\Services\CartoesService;
use Carbon\Carbon;

class CartoesController extends Controller
{
    public function store(CriarCartoesRequest $request){
        
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
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->buscaCartoes();
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

    public function atualizar(AtualizarCartoesRequest $request) {
        Cartao::findOrFail($request->id)->update($request->all());

        return redirect('cartoes');
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
    }
}
