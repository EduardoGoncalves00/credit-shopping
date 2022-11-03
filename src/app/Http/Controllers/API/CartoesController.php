<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AtualizarCartoesRequest;
use App\Http\Requests\CriarCartoesRequest;
use App\Http\Requests\PuxarRelatorioRequest;
use App\Services\CartoesService;

class CartoesController extends Controller
{
    /*
        retorna o metodo index da CartoesService

        crio uma variavel chamda CartoesService e nela armazeno a instancia da service de cartoes
        crio uma variavel chamada cartoes e nela armazeno a variavel CartoesService que esta acessando o metodo index da service
        retorno a variavel cartoes
    */
    public function index()
    {
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->index();
        return $cartoes;
    }

    /*
        retorna uma resposta json de sucesso quando acessa o metodo store da service, e nao reclama de problema

        metodo obrigado a validar pela request e receber uma $request
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        na variavel cartoesServices acessos o metodo store da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service 
    */
    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->store($request);
        return response()->json(['success' => true]);       
    }

    /*
        retorna uma resposta json de sucesso quando acessa o metodo update da service, e nao reclama de problema

        metodo obrigado a validar pela request e receber uma $request
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        na variavel cartoesServices acessos o metodo update da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service 
    */
    public function update(AtualizarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->update($request);
        return response()->json(['success' => true]);
    }
    
    /*
        retorna uma resposta json de sucesso quando acessa o metodo update da service, e nao reclama de problema

        metodo obrigado a validar pela request e receber uma $request (id)
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        na variavel cartoesServices acessos o metodo destroy da service e envio a $id (request) pro metodo na service
        retorna um json apos o envio da $request pra service 
    */
    public function destroy($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->destroy($id);
        return response()->json(['success' => true]);       
    }

    /*
        retorna o metodo showInvoice da service de CartoesService enviando um request

        metodo obrigado a validar pela request e receber uma $request
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        retorno a variavel cartoesService acessando o metodo showInvoice e enviando a $request
    */
    public function viewInvoice(PuxarRelatorioRequest $request)
    {
        $cartoesService = new CartoesService();  
        return $cartoesService->showInvoice($request);
    }
}
