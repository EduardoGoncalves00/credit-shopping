<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Models\Categoria;
use App\Services\CategoriasService;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function criar(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->criar($request);
        return redirect('categorias');
    }

    public function atualizar(CriarAtualizarCategoriasRequest $id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->atualizar($id);
        return redirect('categorias');
}

    public function deletar($id)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->deletar($id);
        return redirect('categorias');
    }

    public function index()
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->index();
        return view('categorias.index', ['categoria'=> $categoria]);
    }

    public function criarview(){
        $categoriasService = new CategoriasService();
        $categoriasService->criarview();
        return view('categorias.criar');
    }

    public function editar($id)
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->editar($id);
        return view('categorias.editar', ['categoria'=> $categoria]);
    }
}
