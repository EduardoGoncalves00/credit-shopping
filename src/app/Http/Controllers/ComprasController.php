<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Models\Cartao;
use App\Models\Categoria;
use App\Models\Compra;
use App\Services\ComprasService;

class ComprasController extends Controller
{
    public function index()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->index();
        return view('compras.lista', ['compras' => $compras]);
    }

    public function create()
    {
        $cartoes = Cartao::all();
        $categorias = Categoria::all();
        $compras = Compra::all();
        return view('compras.index', ['compras'=> $compras, 'cartoes'=> $cartoes, 'categorias'=> $categorias]);
    }
    
    public function store(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->store($request);
        return redirect('/');
    }

    public function edit($id)
    {
        $comprasServices = new ComprasService();
        return $comprasServices->edit($id);
    }

    public function update(AtualizarComprasRequest $id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->update($id);
        return redirect('/');
    }

    public function destroy($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->destroy($id);
        return redirect('/');
    }
}
