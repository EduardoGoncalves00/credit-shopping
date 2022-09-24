<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Services\ComprasService;

class ComprasController extends Controller
{
    public function lista()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->lista();
        return $compras;
    }

    public function criar(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->criar($request);
        return response()->json(['success' => true]);       
    }

    public function atualizar(AtualizarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->atualizar($request);
        return response()->json(['success' => true]);       
    }

    public function deletar($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->deletar($id);
        return response()->json(['success' => true]);       
    }
}
