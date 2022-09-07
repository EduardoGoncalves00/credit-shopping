<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CriarCartoesRequest;
use App\Models\Cartao;
use App\Services\CartoesService;
use Illuminate\Http\Request;

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
}
