<?php

namespace App\Services;

use App\Http\Requests\PuxarRelatorioRequest;
use App\Models\Cartao;
use Carbon\Carbon;

class CartoesService
{
    /*
        o metodo retorna todas os cartoes. caso withTrashed for true devolve os apagados tambem

        o metodo tem o parametro withTrashed com valor padrao true
        ele faz um if, caso a variavel esteja true ele retorna todos os cartoes inclusive os deletados, 
        mas caso seja false ele retornarar apenas os cartoes nao deletados
    */
    public function index($withTrashed = true)
    {
        if ($withTrashed == true){
            return Cartao::withTrashed()->get();
        }

        return Cartao::all();
    }

    /*
        salva no banco os dados enviados para esses metodos
        
        o metodo tem um parametro obrigatório $request
        a classe Cartao é instanciada, armazenando na variavel $cartao
        armazena na propriedade nome, o conteudo que foi enviado no campo nome da $request
        armazena na propriedade dia_pagamento, o conteudo que foi enviado no campo dia_pagamento da $request
        armazena na propriedade dia_fechamento, o conteudo que foi enviado no campo dia_fechamento da $request
        armazena na propriedade banco, o conteudo que foi enviado no campo banco da $request
        chamado o metodo save, onde vai salvar essas informacoes imputadas no banco
    */
    public function store($request)
    {    
        $cartao = new Cartao;
        $cartao->nome = $request->input('nome');
        $cartao->dia_pagamento = $request->input('dia_pagamento');
        $cartao->dia_fechamento = $request->input('dia_fechamento');
        $cartao->banco = $request->input('banco');
        $cartao->save();
    }

    /*
        retorna um cartao 

        o metodo e obrigado a receber uma $request (id)
        retorna a procura no banco pelo id passado na request
    */
    public function edit($id)
    {
        return Cartao::findOrFail($id);
    }
    
    /*
        atualiza o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request
        recebe o $request passado, procura no banco pelo id passado na request
        atualiza no banco com todas as propriedades passadas pelo $request
    */
    public function update($request)
    {
        Cartao::findOrFail($request->id)->update($request->all());
    }

    /*
        deleta o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber um $id
        recebe o id passado por parametro, procura no banco por um igual e deleta ele do banco
    */
    public function destroy($id)
    {
        Cartao::findOrFail($id)->delete();
    }

    /*
        retorna para a view toda a tabela da model

        armazeno na variavel todo resultado da model cartao
        retorna pra view a variavel
    */
    public function showInvoiceSearch()
    {
        return Cartao::all();
    }

    /*
        vai na model e tras: o dia de pagamento, o mes atual selecionado, itens da fatura, total da fatura, e armazena no array

        o metodo e obrigado a receber uma $request
        a variavel $cartao aramazena o resultado, da busca na model por um id especifico, que é o id passado na $request
        diaPagamento e a propriedade que vai na model e resgata a coluna dia_pagamento
        somenteMesAtualSelecionado é um objeto carbon que formata a data que veio da view
        fatura e a propriedade que acessa o metodo itensFatura na model e passa a data, que la faz a regra e retorna
        totalFatura e a propriedade que acessa o metodo totalFatura e passa a data, que la faz a regra e retorna
        */
    public function showInvoice($request)
    {
        $cartao = Cartao::findOrFail($request->cartao_id);

        return [
            'diaPagamento' => $cartao->dia_pagamento,
            'somenteMesAtualSelecionado' => Carbon::createFromFormat('Y-m', $request->data)->format('m'),
            'fatura' => $cartao->itensFatura($request->data),
            'totalFatura' => $cartao->totalFatura($request->data),
        ];
    }
}
