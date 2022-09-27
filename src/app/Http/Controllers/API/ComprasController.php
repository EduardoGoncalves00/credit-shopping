<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Services\ComprasService;

class ComprasController extends Controller
{
    public function index()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->index();
        return $compras;
    }

    public function store(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->store($request);
        return response()->json(['success' => true]);       
    }

    public function update(AtualizarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->update($request);
        return response()->json(['success' => true]);       
    }

    public function destroy($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->destroy($id);
        return response()->json(['success' => true]);       
    }
}
