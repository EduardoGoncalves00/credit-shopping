<?php

namespace App\Http\Controllers;

use App\Models\Cartao;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Compra;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        $cartoes = Cartao::all();
        $categorias = Categoria::all();
        return view('compras.index', ['compras'=> $compras, 'cartoes'=> $cartoes, 'categorias'=> $categorias]);
    }

    public function criar(Request $request)
    {
        $compra = new Compra;
        $compra->descricao = $request->input('descricao');
        $compra->categoria_id = $request->input('categoria_id');
        $compra->valor = $request->input('valor');
        $compra->cartao_id = $request->input('cartao_id');
        $compra->data = $request->input('data');
        $compra->usuario = $request->input('usuario');
        $compra->save();

        return redirect('lista');
    }

    public function deletar($id)
    {
        Compra::findOrFail($id)->delete();

        return redirect('compras');
    }

    public function editar($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compras.editar', ['compra'=> $compra]);
    }

    public function atualizar(Request $request)
    {
        Compra::findOrFail($request->id)->update($request->all());

        return redirect('compras');
    }

    public function criarViewRelatorio()
    {
        $cartoes = Cartao::all();
        return view('compras.relatorios', ['cartoes'=> $cartoes]);
    }

    public function puxarRelatorios(Request $request)
    {
        $cartao = Cartao::findOrFail($request->cartao_id);
        $melhorDia = $cartao->melhorDia();
        $faturaMes = $cartao->fatura();
        
        $mesAnterior = Carbon::createFromFormat('Y-m', $request->data)->subMonthsNoOverflow();
        $mesAnteriorSelecionado = $mesAnterior->format('Y-m');
        
        $mesAtual = Carbon::createFromFormat('Y-m', $request->data);
        $mesAtualSelecionado = $mesAtual->format('Y-m');

        $dataEntre = Compra::whereBetween('data', [$mesAnteriorSelecionado."-".$melhorDia, $mesAtualSelecionado."-".$cartao->dia_fechamento])->get();

        $somaFatura = Compra::whereBetween('data', [$mesAnteriorSelecionado."-".$melhorDia, $mesAtualSelecionado."-".$cartao->dia_fechamento])
                      ->sum('valor') ;

        $somenteMesAtualSelecionado = $mesAtual->format('m');

        $puxadorelatorios = Compra::where(\DB::raw('DATE_FORMAT(data,"%Y-%m")'), $request->get('data'))
                                  ->where('cartao_id', $request->get('cartao_id'))
                                  ->get();

        //$puxadorelatorios = $cartao->fatura($mes, $ano); trocar pela 81 e usar essa


        return view('compras.puxarRelatorio', [
            'diaPagamento' => $cartao->dia_pagamento,
            'somenteMesAtualSelecionado' => $somenteMesAtualSelecionado,
            'somaFatura' => $somaFatura,
            'mesAtualSelecionado' => $mesAtualSelecionado,
            'puxadorelatorios' => $puxadorelatorios, 
            'mesAnteriorSelecionado' => $mesAnteriorSelecionado, 
            'dataEntre' => $dataEntre
        ]);
    }

    public function lista()
    {
        $compras = Compra::all();

        return view('compras.lista', ['compras' => $compras]);
    }

    public function retornarcartoes()
    {
        $aa = Cartao::all();
        return view('compras.index', ['aa'=> $aa]);
    }
}
