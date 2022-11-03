<?php

namespace App\Services;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Models\Cartao;
use App\Models\Categoria;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class ComprasService
{
    /*
        retorna a a tabela de compra, por ordem decrescente baseada pela data, colocando um limite de 20 itens por pagina

        armazeno na variavel compra a tabela compra por ondem descrescente baseada na data, colocando um limite de 20 itens por pagina
        retorno a varaivel compra
    */
    public function index()
    {
        $compras = Compra::orderByDesc('data')->paginate(20);
        return $compras;
    }

    /*
        salva no banco os resultados enviados pela request

        armazenado na variavel id, ira ver qual é o usuario autenticado e resgata o id 

        o metodo e obrigatorio uma request e possui uma request para validacao
        a variavel $compra é instanciada, virando a model compra
        na variavel é chamada a coluna id_logado do banco, onde vai ser armazenado a variavel $id, onde esta o id do usuario logado
        na variavel é chamada a coluna descricao do banco, onde vai ser armazenado o request com a propriedade chamada descricao
        na variavel é chamada a coluna categoria_id do banco, onde vai ser armazenado o request com a propriedade chamada categoria_id
        na variavel é chamada a coluna valor do banco, onde vai ser armazenado o request com a propriedade chamada valor
        na variavel é chamada a coluna valor do cartao_id, onde vai ser armazenado o request com a propriedade chamada cartao_id
        na variavel é chamada a coluna valor do data, onde vai ser armazenado o request com a propriedade chamada data
        na variavel é chamada a coluna valor do usuario, onde vai ser armazenado o request com a propriedade chamada usuario
        e chamado o metodo save, onde vai salvar essas informacoes imputadas no banco
    */
    public function store(CriarComprasRequest $request)
    {
        $id = Auth::user()->id;

        $compra = new Compra;
        $compra->id_logado = $id;
        $compra->descricao = $request->input('descricao');
        $compra->categoria_id = $request->input('categoria_id');
        $compra->valor = $request->input('valor');
        $compra->cartao_id = $request->input('cartao_id');
        $compra->data = $request->input('data');
        $compra->usuario = $request->input('usuario');
        $compra->save();
    }

 /*
        retorna para a view a variavel compra, categorias, cartoes. a variavel compra armazena, a busca na model, pelo id passado na $request e devolve o resultado do banco, a variavel categorias devolve todo resultado da tabela categoria e o cartao o mesmo 

        o metodo e obrigado a receber uma $request (id)
        a variavel $compra aramazena o resultado, da busca na model por um id especifico, que é o id passado na $request
        a variavel categorias devolve todo resultado da tabela categoria
        a variavel cartoes devolve todo resultado da tabela cartoes
        retorna para a view as variaveis
    */
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $categorias = Categoria::all();
        $cartoes = Cartao::all();
        return view('compras.editar', ['compra'=> $compra, 'categorias'=> $categorias, 'cartoes'=> $cartoes]);
    }

     /*
        atualiza o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request (id) e uma request de validacao
        é armazenado na variavel, que recebe o $request passado. procura no banco pelo id passado na request, atualiza no banco com todas as infos passadas no $request
        retorna a variavel 
    */
    public function update(AtualizarComprasRequest $request)
    {
        $compras = Compra::findOrFail($request->id)->update($request->all());
        return $compras;
    }

    /*
        deleta o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request (id)
        armazena na variavel, que recebe o id passado na request, procura no banco por um igual e deleta ele do banco
        retorna a variavel 
    */
    public function destroy($id)
    {
        $compras = Compra::findOrFail($id)->delete();
        return $compras;
    }
}
