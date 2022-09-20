<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Models\Cartao;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Services\ComprasService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function lista()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->lista();
        return view('compras.lista', ['compras' => $compras]);
    }
    
    public function criar(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->criar($request);
        return redirect('lista');
    }

    public function deletar($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->deletar($id);
        return redirect('lista');
    }

    public function atualizar(AtualizarComprasRequest $id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->atualizar($id);
        return redirect('lista');
    }

    public function index()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->index();
        return $compras;
    }

    public function editar($id)
    {
        $comprasServices = new ComprasService();
        return $comprasServices->editar($id);
    }
}
