<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Services\ComprasService;

class ComprasController extends Controller
{
    /*
        busca todas as compras

        crio uma variavel chamada $comprasServices e nela armazeno a instancia da service de compras
        crio uma variavel chamada $compras e nela armazeno o resultado do metodo index da classe ComprasService
        retorno a variavel compras
    */
    public function index()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->index();
        return $compras;
    }

    /*
        salva uma nova compra 

        o metodo valida os campos atraves da request (CriarComprasRequest) e é obrigado a receber uma $request
        instancio uma classe da ComprasService
        em $comprasServices acesso o metodo store da service e envio a $request pro metodo na service
        retorna uma resposta em json
    */
    public function store(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->store($request);
        return response()->json(['success' => true]);       
    }

     /*
        atualizo a compra no banco de dados

        o metodo valida os campos atraves da request (AtualizarComprasRequest) e é obrigado a receber uma $request 
        crio uma variavel chamada $comprasServices e nela armazeno a instancia da service de compras
        acesso o metodo update da service, armazenando o resultado do metodo
        retorna uma resposta em json
    */
    public function update(AtualizarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->update($request);
        return response()->json(['success' => true]);       
    }

    /*
        deleta a compra

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada $comprasServices e nela armazeno o instancia da service de compras
        na variavel $comprasServices acesso o resultado do metodo destroy
        retorna uma resposta em json
    */
    public function destroy($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->destroy($id);
        return response()->json(['success' => true]);       
    }
}
