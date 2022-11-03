<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Services\CategoriasService;

class CategoriasController extends Controller
{
    /*
        retorna o metodo index da categoriasService

        crio uma variavel chamda categoriasService e nela armazeno a instancia da service de categorias
        crio uma variavel chamada categorias e nela armazeno a variavel categoriasService que esta acessando o metodo index da service
        retorno a variavel categorias
    */
    public function index()
    {
        $categoriasService = new CategoriasService();
        $categorias = $categoriasService->index();
        return $categorias;
    }

    /*
        retorna uma resposta json de sucesso quando acessa o metodo store da service, e nao reclama de problema

        metodo obrigado a validar pela request e receber uma $request
        na variavel categoriasService acessos o metodo store da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service 
    */
    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasService = new CategoriasService();
        $categoriasService->store($request);
        return response()->json(['success' => true]); 
    }

    /*
        retorna uma resposta json de sucesso quando acessa o metodo store da service, e nao reclama de problema

        metodo obrigado a validar pela request e receber uma $request
        na variavel categoriasService acessos o metodo update da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service
    */
    public function update(CriarAtualizarCategoriasRequest $request)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->update($request);
        return response()->json(['success' => true]);
    }

    /*
        retorna uma resposta json de sucesso quando acessa o metodo store da service, e nao reclama de problema

        metodo e obrigado a receber um id ($request)
        na variavel categoriasService acessos o metodo destroy da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service
    */
    public function destroy($id)
    {
        $categoriasServices = new CategoriasService();
        $categoriasServices->destroy($id);
        return response()->json(['success' => true]);
    }
}