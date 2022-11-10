<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Services\CategoriasService;

class CategoriasController extends Controller
{
    /*
        busca todas as categorias

        crio uma variavel chamada $categoriasService e nela armazeno a instancia da service de categorias
        crio uma variavel chamada $categorias e nela armazeno o resultado do metodo index da classe CategoriasService
        retorno a variavel categorias
    */
    public function index()
    {
        $categoriasService = new CategoriasService();
        $categorias = $categoriasService->index();
        return $categorias;
    }

    /*
        salva uma nova categoria 

        o metodo valida os campos atraves da request (CriarAtualizarCategoriasRequest) e é obrigado a receber uma $request
        instancio uma classe da CategoriasService
        em $categoriasService acesso o metodo store da service e envio a $request pro metodo na service
        retorna uma resposta em json
    */
    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->store($request);
        return response()->json(['success' => true]); 
    }

    /*
        atualizo a categoria no banco de dados

        o metodo valida os campos atraves da request (CriarAtualizarCategoriasRequest) e é obrigado a receber uma $request 
        crio uma variavel chamada $categoriasServices e nela armazeno a instancia da service de categorias
        acesso o metodo update da service, armazenando o resultado do metodo
        retorna uma resposta em json
    */
    public function update(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->update($request);
        return response()->json(['success' => true]);
    }

     /*
        deleta a categoria

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada $categoriasServices e nela armazeno o instancia da service de categorias
        na variavel categoriasServices acessos o resultado do metodo destroy
        retorna uma resposta em json
    */
    public function destroy($id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->destroy($id);
        return response()->json(['success' => true]);
    }
}