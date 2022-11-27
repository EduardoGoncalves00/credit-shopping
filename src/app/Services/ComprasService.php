<?php

namespace App\Services;

use App\Http\Requests\AtualizarComprasRequest;
use App\Http\Requests\CriarComprasRequest;
use App\Models\Cartao;
use App\Models\Categoria;
use App\Models\Compra;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ComprasService
{
    /*
        retorna todas as compras, por ordem decrescente, com limite de 20 compras por pagina

        armazeno na variavel $compras todas as compras, por ordem decrescente, com limite de 20 compras por pagina
        retorno a varaivel $compras
    */
    public function index()
    {
        $compras = Compra::orderByDesc('data')->paginate(20);
        return $compras;
    }

    /*
        salva no banco os dados enviados para esses metodos

        O metodo valida os campos atraves da request (CriarComprasRequest)
        o metodo tem um parametro obrigatório $request
        armazenado na variavel id, ira ver qual é o usuario autenticado e resgata o id         
        a classe Compra é instanciada, armazenando na variavel $compra
        armazena na propriedade id_logado, a varivel $id
        armazena na propriedade descricao, o conteudo que foi enviado no campo descricao da $request
        armazena na propriedade categoria_id, o conteudo que foi enviado no campo categoria_id da $request
        armazena na propriedade valor, o conteudo que foi enviado no campo valor da $request
        armazena na propriedade cartao_id, o conteudo que foi enviado no campo cartao_id da $request
        armazena na propriedade data, o conteudo que foi enviado no campo data da $request
        armazena na propriedade usuario, o conteudo que foi enviado no campo usuario da $request
        chamado o metodo save, onde vai salvar essas informacoes imputadas no banco
    */
    public function store(CriarComprasRequest $request)
    {
        $id = Auth::user()->id;
        $x = 1;

        while($x <= $request->parcela) {

            $compra = new Compra;
            $compra->id_logado = $id;
            $compra->descricao = $request->input('descricao');
            $compra->categoria_id = $request->input('categoria_id');
            $compra->valor = $request->valor / $request->parcela;
            $compra->parcela = "$x / $request->parcela";
            $compra->cartao_id = $request->input('cartao_id');

            if ($x > 1) {
                $data = Carbon::createFromFormat('Y-m-d', $request->data)->addMonth(1, $x);
                $compra->data = $data;
            } else {$compra->data = $request->input('data');
            }

            $compra->usuario = $request->input('usuario');
            $compra->save();

            $x++; // mesma coisa $x = $x + 1; 
        }  
    }

    /*
        retorna a tela para editar a compra

        o metodo e obrigado a receber uma $request (id)
        armazena na variavel $compra a busca na model por um id especifico, que é o id passado na $request
        armazena na variavel $categorias a tabela de categoria
        armazena na variavel $cartoes a tabela de cartao
        retorna um array com a variavel $compra, $categoria, $cartoes
    */
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $categorias = Categoria::all();
        $cartoes = Cartao::all();

        return [
            'compra'=> $compra, 
            'categorias'=> $categorias, 
            'cartoes'=> $cartoes
        ];
    }

     /*
        atualiza o conteudo no banco, conforme o id recebido

        o metodo valida os campos atraves da request (AtualizarComprasRequest)
        o metodo e obrigado a receber uma $request
        armazena na variavel $compras, que recebe o $request passado, procura no banco pelo id passado na request
        atualiza no banco com todas as propriedades passadas pelo $request
        retorna a variavel $compras
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
        retorna a variavel $compras
    */
    public function destroy($id)
    {
        $compras = Compra::findOrFail($id)->delete();
        return $compras;
    }
}
