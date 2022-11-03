<?php

namespace App\Services;

use App\Http\Requests\CriarAtualizarCategoriasRequest;
use App\Models\Categoria;

class CategoriasService
{
    /*
        o metodo retorna todas as categorias. caso withTrashed for true devolve as apagadas tambem

        o metodo tem a variavel withTrashed com valor false
        ele faz um if, caso a variavel esteja false ele retorna todas as categorias, mas caso seja true ele retornarar todas as categorias juntamente com as deletadas
    */
    public function index($withTrashed = false)
    {
        if ($withTrashed == true){
            return Categoria::withTrashed()->get();
        }

        return Categoria::all();
    }  

    /*
        salva no banco os resultados enviados pela request

        o metodo e obrigatorio uma request e possui uma request para validacao
        a variavel $categoria é instanciada, virando a model categoria
        na variavel é chamada a coluna nome do banco, onde vai ser armazenado o request com a propriedade chamada nome
        e chamado o metodo save, onde vai salvar essas informacoes imputadas no banco
    */
    public function store(CriarAtualizarCategoriasRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->input('nome');
        $categoria->save();
    }

    /*
        retorna a busca na model, pelo id passado na $request e devolve o resultado do banco

        o metodo e obrigado a receber uma $request (id)
        retorna a busca na model por um id especifico, que é o id passado na $request
    */
    public function edit($id)
    {
        return Categoria::findOrFail($id);
    }

    /*
        atualiza o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request (id)
        recebe o $request passado. procura no banco pelo id passado na request, atualiza no banco com todas as infos passadas no $request
    */
    public function update($request)
    {
        Categoria::findOrFail($request->id)->update($request->all());
    }

    /*
        deleta o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request (id)
        recebe o id passado na request, procura no banco por um igual e deleta ele do banco
    */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id)->delete();
        return $categoria;
    }
}
