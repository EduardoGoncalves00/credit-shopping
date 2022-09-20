<?php

namespace App\Services;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Models\Cartao;
use App\Models\Categoria;
use App\Models\Compra;

class ComprasService
{
    public function lista()
    {
        $compras = Compra::all();
        return $compras;
    }

    public function criar(CriarComprasRequest $request)
    {
        $compra = new Compra;
        $compra->descricao = $request->input('descricao');
        $compra->categoria_id = $request->input('categoria_id');
        $compra->valor = $request->input('valor');
        $compra->cartao_id = $request->input('cartao_id');
        $compra->data = $request->input('data');
        $compra->usuario = $request->input('usuario');
        $compra->save();
    }

    public function deletar($id)
    {
        $compras = Compra::findOrFail($id)->delete();
        return $compras;
    }

    public function atualizar(AtualizarComprasRequest $request)
    {
        $compras = Compra::findOrFail($request->id)->update($request->all());
        return $compras;
    }

    public function index()
    {
        $cartoes = Cartao::all();
        $categorias = Categoria::all();
        return view('compras.index', ['cartoes'=> $cartoes, 'categorias'=> $categorias]);
    }

    public function editar($id)
    {
        $compra = Compra::findOrFail($id);
        $categorias = Categoria::all();
        $cartoes = Cartao::all();
        return view('compras.editar', ['compra'=> $compra, 'categorias'=> $categorias, 'cartoes'=> $cartoes]);
    }
}
