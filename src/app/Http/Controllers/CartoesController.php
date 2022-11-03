<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarCartoesRequest;
use App\Http\Requests\CriarCartoesRequest;
use App\Http\Requests\PuxarRelatorioRequest;
use App\Models\Cartao;
use App\Services\CartoesService;
use Barryvdh\DomPDF\Facade\Pdf;

class CartoesController extends Controller
{
    /*
        retorna a view index de cartoes, enviando uma variavel a ela 

        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        crio uma variavel chamada cartoes e nela armazeno a variavel cartoesService que esta acessando o metodo index da service
        retorna a view index enviando a variavel cartoes a ela  
    */
    public function index()
    {
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->index();
        return view('cartoes.index', ['cartoes'=> $cartoes]);
    }

    /*
        retorna a view criar

        retorna uma view criar
    */
    public function create()
    {
        return view('cartoes.criar');
    }

    /*
        retorna um (redirect) redirecao, chamando a rota cards

        o metodo valida os campos atraves da request (CriarCartoesRequest) e é obrigado a receber uma $request
        na variavel cartoesServices acessos o metodo store da service e envio a $request pro metodo na service
        retorno um redirect acessando a rota chamada cards
    */
    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->store($request);
        return redirect('cards');
    }

    /*
        retorna o metodo edit (da service), passando o $request (mas somente o id, pois o laravel entende que $id eu quero apenas o id) para a service

        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        retorna a varivel cartoesServices acessando o metodo edit da service e envio o request pro metodo na service
    */
    public function edit($id)
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->edit($id);
    }

    /*
        retorna uma (redirect) redirecao acessando a rota 

        o metodo valida os campos atraves da request (AtualizarCartoesRequest) e é obrigado a receber uma $request 
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        na variavel cartoesServices acessos o metodo update da service e envio a $request (id) pro metodo na service
        retorna um redirect acessando a rota chamada cards
    */
    public function update(AtualizarCartoesRequest $id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->update($id);
        return redirect('cards');
    }

    /*
        retorna uma (redirect) redirecao acessando a rota

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        na variavel cartoesServices acessos o metodo destroy e envio a $request (id) pro metodo na service
        retorna um redirect acessando a rota chamada cards
    */
    public function destroy($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->destroy($id);
        return redirect('cards');
    }

    /*
        retorna uma view, enviando um array com propriedades que acessam a variavel fatura e buscam da service, e outras duas que acessam o request
        
        o metodo valida os campos atraves da request (PuxarRelatorioRequest) e é obrigado a receber uma $request
        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        crio uma variavel $fatura e nela armazeno a variavel $cartoesService que esta acessando o metodo showInvoice e passando o $request
        retorno a view puxarRelatorio passando um array com propriedades que acessam a variavel $fatura e acessa a propriedade, e tambem resgata o request e setam a propriedade
    */
    public function showInvoice(PuxarRelatorioRequest $request)
    {
        $cartoesService = new CartoesService();
        $fatura = $cartoesService->showInvoice($request);

        return view('compras.puxarRelatorio', [
                    'diaPagamento' => $fatura['diaPagamento'],
                    'somenteMesAtualSelecionado' => $fatura['somenteMesAtualSelecionado'],
                    'totalFatura' => $fatura['totalFatura'],
                    'fatura' => $fatura['fatura'],
                    'cartao_id' => $request->cartao_id,
                    'data' => $request->data,
        ]);
    }

    /*
        retorna um metodo da service

        crio uma variavel chamada cartoesService e nela armazeno a instancia da service de cartoes
        retorno a variavel cartoesServices que acessa o metodo showInvoiceSearch na service
    */
    public function showInvoiceSearch()
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->showInvoiceSearch();
    }

    /*
        metodo retorna um pdf da view relatorioPdf

        o metodo recebe $cartao_id, que é o cartao que foi selecionado no relatorio, e a $data_selecionada que foi o periodo que foi escolhido
        o array se torna um objeto
        e instanciado a service de cartoes na variavel $cartoesService
        e criado a variavel $fatura para trazer o metodo shoInvoice e levar os dois parametro (cartao_id e data_selecionada) 
        sera carregado o pdf na view relatorioPdf 
        sera resgatado do metodo showInvoice o diaPagamento
        sera resgatado do metodo showInvoice o somenteMesAtualSelecionado
        sera resgatado do metodo showInvoice o totalFatura
        sera resgatado do metodo showInvoice o fatura
        sera resgatado da variavel recebida $cartao_id
        sera resgatado da variavel recebida $data_selecionada
        retornado um pdf no formato a4 na horizontal com nome de 'relatorio.pdf'
    */
    public function gerarPdf($cartao_id, $data_selecionada)
    {
        $array = ['cartao_id' => $cartao_id, 'data' => $data_selecionada];
        $objeto = (object)$array;

        $cartoesService = new CartoesService();

        $fatura = $cartoesService->showInvoice($objeto);
    
        $pdf = PDF::loadView('compras.relatorioPdf', [
                            'diaPagamento' => $fatura['diaPagamento'],
                            'somenteMesAtualSelecionado' => $fatura['somenteMesAtualSelecionado'],
                            'totalFatura' => $fatura['totalFatura'],
                            'fatura' => $fatura['fatura']->sortbydesc(),
                            'cartao_id' => $cartao_id,
                            'data' => $data_selecionada]);
        
        return $pdf->setPaper('A4', 'landscape')->stream('relatorio.pdf');
    }
}