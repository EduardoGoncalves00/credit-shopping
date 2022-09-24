<?php

namespace App\Services;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Models\Categoria;

class CategoriasService
{
    public function index($withTrashed = false)
    {
        if ($withTrashed == true){
            return Categoria::withTrashed()->get();
        }

        return Categoria::all();
    }  

    public function create()
    {
        return view('categorias.criar');
    }

    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->input('nome');
        $categoria->save();
    }

    public function edit($id)
    {
        return Categoria::findOrFail($id);
    }

    public function update($request)
    {
        Categoria::findOrFail($request->id)->update($request->all());
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id)->delete();
        return $categoria;
    }
}
