<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Services\CategoriasService;

class CategoriasController extends Controller
{
    public function index()
    {
        $categoriasService = new CategoriasService();
        $categorias = $categoriasService->index();
        return $categorias;
    }

    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->store($request);
        return response()->json(['success' => true]); 
    }

    public function update(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->update($request);
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->destroy($id);
        return response()->json(['success' => true]);
    }
}