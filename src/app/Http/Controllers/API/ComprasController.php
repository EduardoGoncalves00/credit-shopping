<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Services\ComprasService;

class ComprasController extends Controller
{
    /*
        retorna o metodo index da ComprasService

        crio uma variavel chamda comprasServices e nela armazeno a instancia da service de compras
        crio uma variavel chamada compras e nela armazeno a variavel comprasServices que esta acessando o metodo index da service
        retorno a variavel compras
    */
    public function index()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->index();
        return $compras;
    }

    /*
        retorna uma resposta json de sucesso quando acessa o metodo store da service, e nao reclama de problema

        metodo obrigado a validar pela request e receber uma $request
        na variavel comprasServices acessos o metodo store da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service 
    */
    public function store(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->store($request);
        return response()->json(['success' => true]);       
    }

     /*
        retorna uma resposta json de sucesso quando acessa o metodo update da service, e nao reclama de problema

        metodo obrigado a validar pela request e receber uma $request
        na variavel comprasServices acessos o metodo update da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service 
    */
    public function update(AtualizarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->update($request);
        return response()->json(['success' => true]);       
    }

    /*
        retorna uma resposta json de sucesso quando acessa o metodo detroy da service, e nao reclama de problema

        metodo e obrigado a receber um id ($request)
        na variavel categoriasService acessos o metodo destroy da service e envio a $request pro metodo na service
        retorna um json apos o envio da $request pra service
    */
    public function destroy($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->destroy($id);
        return response()->json(['success' => true]);       
    }
}
