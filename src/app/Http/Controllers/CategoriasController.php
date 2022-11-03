<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Services\CategoriasService;

class CategoriasController extends Controller
{
    /*
        retorna a view index de categorias, enviando uma variavel a ela 

        crio uma variavel chamada categoriasService e nela armazeno a instancia da service de categorias
        crio uma variavel chamada categoria e nela armazeno a variavel categoriasService que esta acessando o metodo index da service
        retorna a view index enviando a variavel categoria a ela  
    */
    public function index()
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->index();
        return view('categorias.index', ['categoria'=> $categoria]);
    }

    /*
        retorna a view criar

        retorna a view criar
    */
    public function create()
    {
        return view('categorias.criar');
    }

    /*
        retorna uma (redirect) redirecao, chamando a rota categories 

        o metodo valida os campos atraves da request (CriarAtualizarCategoriasRequest) e é obrigado a receber uma $request
        crio uma variavel chamada categoriasService e nela armazeno a instancia da service de categorias
        acesso o metodo store atraves da variavel categoriasService passando o request
        retorno um redirect acessando a rota chamada categories
    */
    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->store($request);
        return redirect('categories');
    }

    /*
        retorna um view chamada editar, enviando uma variavel a ela, 

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada categoriasService e nela armazeno a instancia da service de categorias
        crio uma variavel chamada categoria e nela armazeno a variavel categoriasService que esta acessando o metodo edit da service e recebendo o $request (id)
        retorna a view editar enviando a variavel categoria a ela  
    */
    public function edit($id)
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->edit($id);
        return view('categorias.editar', ['categoria'=> $categoria]);
    }

    /*
        retorna uma (redirect) redirecao, chamando a rota categories

        o metodo valida os campos atraves da request (CriarAtualizarCategoriasRequest) e é obrigado a receber uma $request (id)
        crio uma variavel chamada categoriasService e nela armazeno a instancia da service de categorias
        acesso o metodo update atraves da variavel categoriasService passando o $request (id)
        retorno um redirect acessando a rota chamada categories
    */
    public function update(CriarAtualizarCategoriasRequest $id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->update($id);
        return redirect('categories');
    }

    /*
        retorna uma (redirect) redirecao, chamando a rota categories  é obrigado a receber uma $request
      
        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada categoriasService e nela armazeno a instancia da service de categorias
        acesso o metodo destroy atraves da variavel categoriasService passando o $request (id)
        retorno um redirect acessando a rota chamada categories
    */
    public function destroy($id)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->destroy($id);
        return redirect('categories');
    }
}
