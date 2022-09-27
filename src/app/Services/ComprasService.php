<?php

namespace App\Services;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Models\Cartao;
use App\Models\Categoria;
use App\Models\Compra;

class ComprasService
{
    public function index()
    {
        $compras = Compra::all();
        return $compras;
    }

    public function store(CriarComprasRequest $request)
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

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $categorias = Categoria::all();
        $cartoes = Cartao::all();
        return view('compras.editar', ['compra'=> $compra, 'categorias'=> $categorias, 'cartoes'=> $cartoes]);
    }

    public function update(AtualizarComprasRequest $request)
    {
        $compras = Compra::findOrFail($request->id)->update($request->all());
        return $compras;
    }

    public function destroy($id)
    {
        $compras = Compra::findOrFail($id)->delete();
        return $compras;
    }
}
