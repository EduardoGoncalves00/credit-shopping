<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Services\CategoriasService;

class CategoriasController extends Controller
{
    /*
        busca todas categorias

        crio uma variavel chamada $categoriasService e nela armazeno a instancia da service de categorias
        crio uma variavel chamada $categoria e nela armazeno o resultado do metodo index da classe CategoriasService
        retorna a view index enviando a variavel categoria a ela 
    */
    public function index()
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->index();
        return view('categorias.index', ['categoria'=> $categoria]);
    }

    /*
        retorna uma pagina para a criacao de categorias

        retorna a view criar, de categorias
    */
    public function create()
    {
        return view('categorias.criar');
    }

    /*
        salvar uma nova categoria 

        o metodo valida os campos atraves da request (CriarAtualizarCategoriasRequest) e é obrigado a receber uma $request
        instancio uma classe da categorias services
        em categoriasService acesso o metodo store da service e envio a $request pro metodo na service
        retorno um redirect acessando a rota chamada categories
    */
    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->store($request);
        return redirect('categories');
    }

    /*
        retorna uma tela para editar a categoria

        obrigatorio receber um parametro $id
        instanciado a classe CategoriasService
        crio uma variavel chamada $categoria e nela armazeno o resultado do metodo edit 
        que foi chamado passando o id, da classe CategoriasService
        retorna uma view passando a variavel categoria
    */
    public function edit($id)
    {
        $categoriasService = new CategoriasService();
        $categoria = $categoriasService->edit($id);
        return view('categorias.editar', ['categoria'=> $categoria]);
    }

    /*
        atualizo a categoria no banco de dados

        o metodo valida os campos atraves da request (CriarAtualizarCategoriasRequest) e é obrigado a receber um $id 
        crio uma variavel chamada $categoriasServices e nela armazeno a instancia da service de categorias
        acesso o metodo update da service, armazenando o resultado do metodo
        retorna um redirect acessando a rota chamada categories
    */
    public function update(CriarAtualizarCategoriasRequest $id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->update($id);
        return redirect('categories');
    }

    /*
        deleta a categoria

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada $categoriasService e nela armazeno o instancia da service de categorias
        na variavel categoriasService acessos o resultado do metodo destroy
        retorna um redirect acessando a rota chamada categories
    */
    public function destroy($id)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->destroy($id);
        return redirect('categories');
    }
}
