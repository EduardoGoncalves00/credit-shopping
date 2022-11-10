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
        busca todos os cartoes

        crio uma variavel chamada $cartoesService e nela armazeno a instancia da service de cartoes
        crio uma variavel chamada $cartoes e nela armazeno o resultado do metodo index da classe CartoesService
        retorno a variavel cartoes
    */
    public function index()
    {
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->index();
        return $cartoes;
    }

    /*
        salva um novo cartao 

        o metodo valida os campos atraves da request (CriarCartoesRequest) e é obrigado a receber uma $request
        instancio uma classe da cartoes services
        em $cartoesServices acesso o metodo store da service e envio a $request pro metodo na service
        retorna uma resposta em json
    */
    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->store($request);
        return response()->json(['success' => true]);       
    }

    /*
         atualizo o cartao no banco de dados

        o metodo valida os campos atraves da request (AtualizarCartoesRequest) e é obrigado a receber uma $request 
        crio uma variavel chamada $cartoesServices e nela armazeno a instancia da service de cartoes
        acesso o metodo update da service, armazenando o resultado do metodo
        retorna uma resposta em json
    */
    public function update(AtualizarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->update($request);
        return response()->json(['success' => true]);
    }
    
    /*
        deleta o cartao

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada $cartoesService e nela armazeno o instancia da service de cartoes
        na variavel cartoesServices acessos o resultado do metodo destroy
        retorna uma resposta em json
    */
    public function destroy($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->destroy($id);
        return response()->json(['success' => true]);       
    }

    /*
        retorna o relatorio

        o metodo valida os campos atraves da request (PuxarRelatorioRequest) e é obrigado a receber uma $request 
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        retorno a variavel cartoesService acesso o resultado do metodo showInvoice
    */
    public function viewInvoice(PuxarRelatorioRequest $request)
    {
        $cartoesService = new CartoesService();  
        return $cartoesService->showInvoice($request);
    }
}
