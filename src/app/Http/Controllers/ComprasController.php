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
        buscando todos as compras 

        crio uma variavel chamada $comprasServices e nela armazeno a instancia da service de compras
        crio uma variavel chamada $compras e nela armazeno o resultado do metodo index da classe ComprasService
        retorna a view lista enviando a variavel compras a ela 
    */
    public function index()
    {
        $comprasServices = new ComprasService();
        $compras = $comprasServices->index();
        return view('compras.lista', ['compras' => $compras]);
    }

    /*
        retorna uma pagina para a criacao de compras

        crio uma variavel chamada $cartoes e armazeno o resultado da model Cartao
        crio uma variavel chamada $categorias e armazeno o resultado da model Categoria
        crio uma variavel chamada $compras e armazeno o resultado da model Compra

        retorna a view index enviando a variavel $cartoes, $categorias, $compras, a ela 
    */
    public function create()
    {
        $cartoes = Cartao::all();
        $categorias = Categoria::all();
        $compras = Compra::all();
        return view('compras.index', ['compras'=> $compras, 'cartoes'=> $cartoes, 'categorias'=> $categorias]);
    }
    
    /*
        salvar uma nova compra  

        o metodo valida os campos atraves da request (CriarComprasRequest) e é obrigado a receber uma $request
        instancio uma classe da ComprasService
        em comprasServices acesso o metodo store da service e envio a $request pro metodo na service
        retorno um redirect acessando a rota chamada /
    */
    public function store(CriarComprasRequest $request)
    {
        $comprasServices = new ComprasService();
        $comprasServices->store($request);
        return redirect('/');
    }

    /*
        retorna uma tela para editar a compra

        obrigatorio receber um parametro $id
        instanciado a classe ComprasService
        crio uma variavel chamada $compra e nela armazeno o resultado do metodo edit 
        que foi chamado passando o id, da classe ComprasService
        retorno a view editar, passando um array com os indices que acessam a variavel $compra e acessa o indice do array,     
    */
    public function edit($id)
    {
        $comprasServices = new ComprasService();
        $compra = $comprasServices->edit($id);   
        
        return view('compras.editar', [
                    'compra' => $compra['compra'],
                    'categorias' => $compra['categorias'],
                    'cartoes' => $compra['cartoes']
        ]);     
    }

    /*
        atualizo a compra no banco de dados

        o metodo valida os campos atraves da request (AtualizarComprasRequest) e é obrigado a receber um $id 
        crio uma variavel chamada $comprasServices e nela armazeno a instancia da service de compras
        acesso o metodo update da service, armazenando o resultado do metodo
        retorna um redirect acessando a rota chamada /
    */
    public function update(AtualizarComprasRequest $id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->update($id);
        return redirect('/');
    }

    /*
        deleta a compra

        o metodo é obrigado a receber uma $request (id)
        crio uma variavel chamada $comprasServices e nela armazeno o instancia da service de compras
        na variavel comprasServices acessos o resultado do metodo destroy
        retorna um redirect acessando a rota chamada /
    */
    public function destroy($id)
    {
        $comprasServices = new ComprasService();
        $comprasServices->destroy($id);
        return redirect('/');
    }
}
