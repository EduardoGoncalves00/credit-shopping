<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Services\CategoriasService;

class CategoriasController extends Controller
{
    public function criar(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->criar($request);
        return response()->json(['success' => true]); 
    }

    public function index()
    {
        $categoriasService = new CategoriasService();
        $categorias = $categoriasService->index();
        return $categorias;
    }

    public function deletar($id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->deletar($id);
        return response()->json(['success' => true]);
    }

    public function atualizar(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->atualizar($request);
        return response()->json(['success' => true]);
    }
}