<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
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
        $comprasServices = new ComprasService();
        $compras = $comprasServices->create();
        return $compras;
    }
    
    public function store(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->store($request);
        return redirect('list_shopping');
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
        return redirect('list_shopping');
    }

    public function destroy($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->destroy($id);
        return redirect('list_shopping');
    }
}
