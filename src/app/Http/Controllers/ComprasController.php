<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Models\Cartao;
use App\Models\Categoria;
use App\Models\Compra;
use App\Services\ComprasService;

class ComprasController extends Controller
{
     /*
        retorna a view lista, enviando uma variavel a ela 

        crio uma variavel chamda comprasServices e nela armazeno a instancia da service de compras
        crio uma variavel chamada compras e nela armazeno a variavel comprasServices que esta acessando o metodo index da service
        retorna a view lista enviando a variavel compras a ela  
    */
    public function index()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->index();
        return view('compras.lista', ['compras' => $compras]);
    }

    /*
        retorn a view index, enviando um array com as variaveis pra ela

        crio uma variavel chamada cartoes e armazeno o resultado da tabela cartao
        crio uma variavel chamada categorias e armazeno o resultado da tabela categoria
        crio uma variavel chamada compras e armazeno o resultado da tabela compra
        retorna a view chamada index enviando as variaveis a ela  
    */
    public function create()
    {
        $cartoes = Cartao::all();
        $categorias = Categoria::all();
        $compras = Compra::all();
        return view('compras.index', ['compras'=> $compras, 'cartoes'=> $cartoes, 'categorias'=> $categorias]);
    }
    
    /*
        retorna um (redirect) redirecao, chamando a rota /

        o metodo valida os campos atraves da request (CriarComprasRequest) e é obrigado a receber uma $request
        na variavel comprasServices acessos o metodo store da service e envio a $request pro metodo na service
        retorno um redirect acessando a rota chamada /
    */
    public function store(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->store($request);
        return redirect('/');
    }

    /*
        retorna o metodo edit, passando o $request (mas somente o id, pois o laravel entende que $id eu quero apenas o id) para a service
        
        crio uma variavel chamada comprasServices e nela armazeno a instancia da service de compras
        retorna a varivel comprasServices acessando o metodo edit da service e envia o request pro metodo na service
    */
    public function edit($id)
    {
        $comprasServices = new ComprasService();
        return $comprasServices->edit($id);
    }

    /*
        retorna um (redirect) redirecao, chamando a rota /

        o metodo valida os campos atraves da request (AtualizarComprasRequest) e é obrigado a receber uma $request (id)
        na variavel comprasServices acessa o metodo update da service e envia a $request (id) pro metodo na service
        retorno um redirect acessando a rota chamada /
    */
    public function update(AtualizarComprasRequest $id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->update($id);
        return redirect('/');
    }

    /*
        retorna um (redirect) redirecao, chamando a rota /

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada comprasServices e nela armazeno a instancia da service de compras
        na variavel comprasServices acessa o metodo update da service e envia a $request (id) pro metodo na service
        retorno um redirect acessando a rota chamado /
    */
    public function destroy($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->destroy($id);
        return redirect('/');
    }
}
