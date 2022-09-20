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
    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->criarCartao($request);
        return redirect('cartoes');
    }

    public function criar()
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->criar();
    }

    public function index()
    {
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->buscaCartoes();
        return view('cartoes.index', ['cartoes'=> $cartoes]);
    }

    public function deletar($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->deletar($id);
        return redirect('cartoes');
    }

    public function editar($id)
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->editar($id);
    }

    public function atualizar(AtualizarCartoesRequest $id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->atualizar($id);
        return redirect('cartoes');
    }

    public function criarViewRelatorio()
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->criarViewRelatorio();
    }

    public function buscarFatura(PuxarRelatorioRequest $request)
    {
        $cartoesService = new CartoesService();
        return $cartoesService->buscarFatura($request);
    }

    // public function buscarFatura(PuxarRelatorioRequest $request)
    // {
    //     $cartao = Cartao::findOrFail($request->cartao_id);
                
    //     $mesSelecionado = Carbon::createFromFormat('Y-m', $request->data)->format('m');
      
    //     $relatorio = $cartao->itensFatura($request->data);
    //     $total = $cartao->totalFatura($request->data);
        
    //     return view('compras.puxarRelatorio', [
    //         'diaPagamento' => $cartao->dia_pagamento,
    //         'somenteMesAtualSelecionado' => $mesSelecionado,
    //         'somaFatura' => $total,
    //         'relatorio' => $relatorio
    //     ]);
    // }
}
