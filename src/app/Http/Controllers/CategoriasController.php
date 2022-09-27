<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Services\CategoriasService;

class CategoriasController extends Controller
{
    public function index()
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->index();
        return view('categorias.index', ['categoria'=> $categoria]);
    }

    public function create()
    {
        return view('categorias.criar');
    }

    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->store($request);
        return redirect('categories');
    }

    public function edit($id)
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->edit($id);
        return view('categorias.editar', ['categoria'=> $categoria]);
    }

    public function update(CriarAtualizarCategoriasRequest $id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->update($id);
        return redirect('categories');
    }

    public function destroy($id)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->destroy($id);
        return redirect('categories');
    }
}
