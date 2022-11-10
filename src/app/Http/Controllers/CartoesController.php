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
        buscando todos os cartoes 

        crio uma variavel chamada $cartoesService e nela armazeno a instancia da service de cartoes
        crio uma variavel chamada $cartoes e nela armazeno o resultado do metodo index da classe CartoesService
        retorna a view index enviando a variavel cartoes a ela 
    */
    public function index()
    {
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->index();
        return view('cartoes.index', ['cartoes'=> $cartoes]);
    }

    /*
        retorna uma pagina para a criacao de cartoes

        retorna a view criar, de cartoes
    */
    public function create()
    {
        return view('cartoes.criar');
    }

    /*
        salva um novo cartao 

        o metodo valida os campos atraves da request (CriarCartoesRequest) e é obrigado a receber uma $request
        instancio uma classe da cartoes services
        em cartoesServices acesso o metodo store da service e envio a $request pro metodo na service
        retorno um redirect acessando a rota chamada cards
    */
    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->store($request);
        return redirect('cards');
    }

    /*
        retorna uma tela para editar o cartao

        obrigatorio receber um parametro $id
        instanciado a classe CartoesService
        crio uma variavel chamada $cartao e nela armazeno o resultado do metodo edit 
        que foi chamado passando o id, da classe CartoesService
        retorna uma view passando a variavel cartao
    */
    public function edit($id)
    {
        $cartoesServices = new CartoesService();
        $cartao = $cartoesServices->edit($id);
        return view('cartoes.editar', ['cartao'=> $cartao]);
    }

    /*
        atualizo o cartao no banco de dados

        o metodo valida os campos atraves da request (AtualizarCartoesRequest) e é obrigado a receber uma $request 
        crio uma variavel chamada $cartoesService e nela armazeno a instancia da service de cartoes
        acesso o metodo update da service, armazenando o resultado do metodo
        retorna um redirect acessando a rota chamada cards
    */
    public function update(AtualizarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->update($request);
        return redirect('cards');
    }

    /*
        deleta o cartao

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada $cartoesService e nela armazeno o instancia da service de cartoes
        na variavel cartoesServices acessos o resultado do metodo destroy
        retorna um redirect acessando a rota chamada cards
    */
    public function destroy($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->destroy($id);
        return redirect('cards');
    }

    /*
        retorna a pagina para buscar o relatorio

        crio uma variavel chamada $cartoesService e nela armazeno a instancia da service de cartoes
        armazena a variavel cartoes que acessa o resultado do metodo showInvoiceSearch na service
        retorno uma view passando a variavel $cartoes
    */
    public function showInvoiceSearch()
    {
        $cartoesServices = new CartoesService();
        $cartoes = $cartoesServices->showInvoiceSearch();
        return view('compras.relatorios', ['cartoes'=> $cartoes]);
    }

    /*
        retorna o relatorio num periodo e cartao especifico 
        
        o metodo valida os campos atraves da request (PuxarRelatorioRequest) e é obrigado a receber uma $request
        crio uma variavel chamada $cartoesService e nela armazeno a instancia da service de cartoes
        crio uma variavel $fatura e nela armazeno o resultado do metodo showInvoice
        retorno a view puxarRelatorio, passando um array com os indices que acessam a variavel $fatura e acessa o indice do array, 
        e tambem devolve informacoes do $request encaminhadas como parametro
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
        retorna um pdf do relatorio

        o metodo recebe dois parametros, $cartao_id, que é o cartao que foi selecionado no relatorio, e a $data_selecionada que foi o periodo que foi escolhido
        criei um array com os dois parametros
        convertido o array para um objeto
        e instanciado a service de cartoes na variavel $cartoesService
        e criado a variavel $fatura para trazer o resultado do metodo shoInvoice e levar a variavel $objeto 
        criado a variavel $pdf que armazenara o resultado da funcao loadview da classe PDF
        retornado um pdf no formato A4 na horizontal com nome de 'relatorio.pdf'
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
                            'fatura' => $fatura['fatura'],
                            'cartao_id' => $cartao_id,
                            'data' => $data_selecionada]);
        
        return $pdf->setPaper('A4', 'landscape')->stream('relatorio.pdf');
    }
}