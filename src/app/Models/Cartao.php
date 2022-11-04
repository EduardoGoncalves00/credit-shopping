<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cartao extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = false;

    protected $table = 'cartoes';

    protected $guarded = [];

    /*
        retorna todas as compras do cartao
        retorna um array contendo 0 ou mais objetos de compras

        hasMany = tem muitos
        exemplo: 
        cartao = 2

        compra | descricao | cartao_id 
        53     | sapato    | 2 
        61     | roupa     | 2
        
        nesse exemplo no cartao de id 2, ao chamar o metodo compras retornaria um array com dois objetos de compras


    */
    public function compras()
    {
        return $this->hasMany(Compra::class, 'cartao_id', 'id');
    }

    /*
        retorna o melhor dia de compra

        o metodo é obrigado a retornar algo do tipo string
        ele retorna um objeto carbon para manipular a data, indo na tabela cartao, na coluna dia_fechamento e resgatando a data, apos isso adiciona um dia a mais e formata para retornar somente o dia
    */
    public function melhorDia():string
    {
        return Carbon::createFromFormat('d', $this->dia_fechamento)->addDays(1)->format('d');
    }

    /*
        retorna as compras da data selecionada apartir do melhor dia de compra ate o dia do fechamento do cartao no mes selecionado

        ele recebe uma data (exemplo: 2022-06) no formato string. apos ele criou um objeto carbon para manipular como data, 
        formatando para uma data do tipo Y-m, tambem resgatando o mes anterior dessa data (enviada) com format.
        resgata o dia de fechamento (dia_fechamento) na tabela cartao, do cartao escolhido
        acessa o method melhorDia() para resgatar o melhor dia para compra
        acessa o relacionamento compras deste cartao
        onde as compras estao entre o dia fechamento e melhor dia usando como referencia a coluna data do banco
        fazendo uma ordenecao decrescente, resgatando a data mais recente primeiro ate as mais antiga da tabela
        retornando uma colecao (objeto) de objetos de compras 
    */
    public function itensFatura(string $dataFormulario)
    {
        $data = Carbon::createFromFormat('Y-m', $dataFormulario);
        $mesAtual = $data->format('Y-m');
        $mesAnterior = $data->subMonthsNoOverflow()->format('Y-m');
       
        $diaFechamento = $this->dia_fechamento;
        $melhorDia = $this->melhorDia();

        return $this->compras()->whereBetween('data', [$mesAnterior."-".$melhorDia, $mesAtual."-".$diaFechamento])->get()->sortByDesc('data');
    }

    /*
        retorna as compras da data selecionada apartir do melhor dia de compra ate o dia do fechamento do cartao no mes selecionado, filtrando a coluna 'valor' e somando os valores contidos nela
    */
    public function totalFatura(string $dataFormulario)
    {
        $data = Carbon::createFromFormat('Y-m', $dataFormulario);
        $mesAtual = $data->format('Y-m');
        $mesAnterior = $data->subMonthsNoOverflow()->format('Y-m');

        $diaFechamento = $this->dia_fechamento;
        $melhorDia = $this->melhorDia();

        return $this->compras()->whereBetween('data', [$mesAnterior."-".$melhorDia, $mesAtual."-".$diaFechamento])->sum('valor'); // faz o sum direto no banco (+ performatico)
    }   
}
