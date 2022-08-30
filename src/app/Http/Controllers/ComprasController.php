<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
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

        return redirect('lista');
    }

    public function deletar($id)
    {
        Compra::findOrFail($id)->delete();

        return redirect('lista');
    }

    public function editar($id)
    {
        $compra = Compra::findOrFail($id);
        $categorias = Categoria::all();
        $cartoes = Cartao::all();
        return view('compras.editar', ['compra'=> $compra, 'categorias'=> $categorias, 'cartoes'=> $cartoes]);
    }

    public function atualizar(AtualizarComprasRequest $request)
    {
        Compra::findOrFail($request->id)->update($request->all());

        return redirect('lista');
    }

    public function lista()
    {
        $compras = Compra::all();

        return view('compras.lista', ['compras' => $compras]);
    }
}
