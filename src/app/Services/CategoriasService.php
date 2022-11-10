<?php

namespace App\Services;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Models\Categoria;

class CategoriasService
{
    /*
        o metodo retorna todas as categorias. caso withTrashed for true devolve as apagadas tambem

        o metodo tem o parametro withTrashed com valor padrao false
        ele faz um if, caso a variavel esteja true ele retorna todas as categorias inclusive as deletadas, 
        mas caso seja false ele retornarar apenas as categorias nao deletadas
    */
    public function index($withTrashed = false)
    {
        if ($withTrashed == true){
            return Categoria::withTrashed()->get();
        }

        return Categoria::all();
    }  

    /*
        salva no banco os dados enviados para esses metodos
        
        o metodo valida os campos atraves da request (CriarAtualizarCategoriasRequest)
        o metodo tem um parametro obrigatório $request
        a classe Categoria é instanciada, armazenando na variavel $categoria
        armazena na propriedade nome, o conteudo que foi enviado no campo nome da $request
        chamado o metodo save, onde vai salvar essas informacoes imputadas no banco
    */
    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->input('nome');
        $categoria->save();
    }

    /*
        retorna uma categoria 

        o metodo e obrigado a receber uma $request (id)
        retorna a procura no banco pelo id passado na request
    */
    public function edit($id)
    {
        return Categoria::findOrFail($id);
    }

    /*
        atualiza o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request
        recebe o $request passado, procura no banco pelo id passado na request
        atualiza no banco com todas as propriedades passadas pelo $request
    */
    public function update($request)
    {
        Categoria::findOrFail($request->id)->update($request->all());
    }

    /*
        deleta o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber um $id
        armazena na variavel $categoria, que recebe o id passado por parametro, procura no banco por um igual e deleta ele do banco
        retorna a variavel $categoria
    */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id)->delete();
        return $categoria;
    }
}
