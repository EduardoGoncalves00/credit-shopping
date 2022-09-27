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
        $cartoes = $cartoesService->index();
        return $cartoes;
    }

    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->store($request);
        return response()->json(['success' => true]);       
    }

    public function update(AtualizarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->update($request);
        return response()->json(['success' => true]);
    }
    
    public function destroy($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->destroy($id);
        return response()->json(['success' => true]);       
    }

    public function viewInvoice(PuxarRelatorioRequest $request)
    {
        $cartoesService = new CartoesService();  
        return $cartoesService->showInvoice($request);
    }
}
