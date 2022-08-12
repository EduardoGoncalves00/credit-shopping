@forelse ($relatorio as $relatorioPuxado)

    <li>
        id: {{ $relatorioPuxado->id }} -  descricao: {{ $relatorioPuxado->descricao }} - categoria: {{ $relatorioPuxado->categoria->nome }} - valor: {{ $relatorioPuxado->valor }} - cartao: {{ $relatorioPuxado->cartao->nome }} - data: {{ $relatorioPuxado->data->format('d/m/y') }} - usuario: {{ $relatorioPuxado->usuario }}
    </li>

    <br>
@empty
    nao tem relatorio nesse periodo
@endforelse

<h3>Valor total da fatura: {{$somaFatura}}</h3> 
<H3>Dia do pagamento {{$diaPagamento}}</H3>
<h3>Fatura do mes: {{$somenteMesAtualSelecionado}}</h3>
