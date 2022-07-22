<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function criar(Request $request)
    {
        $categoria = new Categoria;
        $categoria->nome = $request->input('nome');
        $categoria->save();

        return redirect('categorias');
    }

    public function criarview(){
        return view('categorias.criar');
    }

    public function index()
    {
        $categoria = Categoria::all();
        return view('categorias.index', ['categoria'=> $categoria]);
    }

    public function deletar($id)
    {
        Categoria::findOrFail($id)->delete();

        return redirect('categorias');
    }

    public function editar($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.editar', ['categoria'=> $categoria]);
    }

    public function atualizar(Request $request)
    {
        Categoria::findOrFail($request->id)->update($request->all());

        return redirect('categorias');
    }
}
