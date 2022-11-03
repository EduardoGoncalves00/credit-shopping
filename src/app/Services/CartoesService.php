<?php

namespace App\Services;

use App\Http\Requests\PuxarRelatorioRequest;
use App\Models\Cartao;
use Carbon\Carbon;

class CartoesService
{
    /*
        o metodo retorna todas os cartoes. caso withTrashed for true devolve os apagados tambem

        o metodo tem a variavel withTrashed com valor true
        ele faz um if, caso a variavel esteja false ele retorna todos os cartoes, mas caso seja true ele retornarar todos os cartoes juntamente com os deletados
    */
    public function index($withTrashed = true)
    {
        if ($withTrashed == true){
            return Cartao::withTrashed()->get();
        }

        return Cartao::all();
    }

    /*
        salva no banco os resultados enviados pela request
        
        o metodo e obrigatorio uma request
        a variavel $cartao é instanciada, virando a model cartao
        na variavel é chamada a coluna nome do banco, onde vai ser armazenado o request com a propriedade chamada nome
        na variavel é chamada a coluna dia_pagamento do banco, onde vai ser armazenado o request com a propriedade chamada dia_pagamento
        na variavel é chamada a coluna dia_fechamento do banco, onde vai ser armazenado o request com a propriedade chamada dia_fechamento
        na variavel é chamada a coluna chamada banco do banco, onde vai ser armazenado o request com a propriedade chamada banco
        e chamado o metodo save, onde vai salvar essas informacoes imputadas no banco
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
        retorna para a view a variavel cartao. a variavel armazena, a busca na model, pelo id passado na $request e devolve o resultado do banco

        o metodo e obrigado a receber uma $request (id)
        a variavel $cartao aramazena o resultado, da busca na model por um id especifico, que é o id passado na $request
        retorna para a view a variavel $cartao
    */
    public function edit($id)
    {
        $cartao = Cartao::findOrFail($id);
        return view('cartoes.editar', ['cartao'=> $cartao]);
    }

    /*
        deleta o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request (id)
        recebe o id passado na request, procura no banco por um igual e deleta ele do banco
    */
    public function destroy($id)
    {
        Cartao::findOrFail($id)->delete();
    }
    
    /*
        atualia o conteudo no banco, conforme o id recebido

        o metodo e obrigado a receber uma $request (id)
        recebe o $request passado. procura no banco pelo id passado na request, atualiza no banco com todas as infos passadas no $request
    */
    public function update($request)
    {
        Cartao::findOrFail($request->id)->update($request->all());
    }

    /*
        retorna para a view toda a tabela da model

        armazeno na variavel todo resultado da model cartao
        retorna pra view a variavel
    */
    public function showInvoiceSearch()
    {
        $cartoes = Cartao::all();
        return view('compras.relatorios', ['cartoes'=> $cartoes]);
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
