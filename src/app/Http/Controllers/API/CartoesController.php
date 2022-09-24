<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AtualizarCartoesRequest;
use App\Http\Requests\CriarCartoesRequest;
use App\Http\Requests\PuxarRelatorioRequest;
use App\Services\CartoesService;

class CartoesController extends Controller
{
    public function index()
    {
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->buscaCartoes();
        return $cartoes;
    }

    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->criarCartao($request);
        return response()->json(['success' => true]);       
    }

    public function atualizar(AtualizarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->atualizar($request);
        return response()->json(['success' => true]);
    }
    
    public function deletar($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->deletar($id);
        return response()->json(['success' => true]);       
    }

    public function buscarFatura(PuxarRelatorioRequest $request)
    {
        $cartoesService = new CartoesService();
        return $cartoesService->buscarFatura($request);
    }
}
