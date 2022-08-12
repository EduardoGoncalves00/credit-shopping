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

    public function lista()
    {
        $compras = Compra::all();

        return view('compras.lista', ['compras' => $compras]);
    }
}
