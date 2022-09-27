<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarCartoesRequest;
use App\Http\Requests\CriarCartoesRequest;
use App\Http\Requests\PuxarRelatorioRequest;
use App\Services\CartoesService;

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
        $cartoesServices = new CartoesService();
        return $cartoesServices->create();
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

    public function viewInvoice(PuxarRelatorioRequest $request)
    {
        $cartoesService = new CartoesService();
        $fatura = $cartoesService->viewInvoice($request);
        
        return view('compras.puxarRelatorio', [
                    'diaPagamento' => $fatura['diaPagamento'],
                    'somenteMesAtualSelecionado' => $fatura['somenteMesAtualSelecionado'],
                    'totalFatura' => $fatura['totalFatura'],
                    'fatura' => $fatura['fatura']
        ]);
    }

    public function viewInvoiceSearch()
    {
        $cartoesServices = new CartoesService();
        return $cartoesServices->viewInvoiceSearch();
    }
}