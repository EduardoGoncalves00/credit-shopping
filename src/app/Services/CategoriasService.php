<?php

namespace App\Services;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Models\Categoria;

class CategoriasService
{
    public function criar(CriarAtualizarCategoriasRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->input('nome');
        $categoria->save();
    }

    public function index($withTrashed = false)
    {
        if ($withTrashed == true){
            return Categoria::withTrashed()->get();
        }

        return Categoria::all();
    }  

    public function deletar($id)
    {
        $categoria = Categoria::findOrFail($id)->delete();
        return $categoria;
    }

    public function atualizar($request)
    {
        Categoria::findOrFail($request->id)->update($request->all());
    }

    public function editar($id)
    {
        return Categoria::findOrFail($id);
    }

    public function criarview(){
        return view('categorias.criar');
    }
}
