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
    public function index()
    {
        $cartoesService = new CartoesService();
        $cartoes = $cartoesService->index();
        return view('cartoes.index', ['cartoes'=> $cartoes]);
    }

    public function create()
    {
        return view('cartoes.criar');
    }

    public function store(CriarCartoesRequest $request)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->store($request);
        return redirect('cards');
    }

    public function edit($id)
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->edit($id);
    }

    public function update(AtualizarCartoesRequest $id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->update($id);
        return redirect('cards');
    }

    public function destroy($id)
    {
        $cartoesServices = new CartoesService();
        $cartoesServices->destroy($id);
        return redirect('cards');
    }

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

    public function showInvoiceSearch()
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->showInvoiceSearch();
    }

    public function gerarPdf($cartao_id, $data_selecionada)
    {
        $array = ['cartao_id' => $cartao_id, 'data' => $data_selecionada];
        $objeto = (object)$array;

        $cartoesService = new CartoesService();

        $fatura = $cartoesService->showInvoice($objeto);
    
        $pdf = PDF::loadView('compras.puxarRelatorio', [
                            'diaPagamento' => $fatura['diaPagamento'],
                            'somenteMesAtualSelecionado' => $fatura['somenteMesAtualSelecionado'],
                            'totalFatura' => $fatura['totalFatura'],
                            'fatura' => $fatura['fatura'],
                            'cartao_id' => $cartao_id,
                            'data' => $data_selecionada]);
        
        return $pdf->setPaper('a4')->stream('relatorio.pdf');
    }
}