<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}
