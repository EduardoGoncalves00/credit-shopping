@forelse ($dataEntre as $entre)

    <li>
        id: {{ $entre->id }} -  descricao: {{ $entre->descricao }} - categoria: {{ $entre->categoria->nome }} - valor: {{ $entre->valor }} - cartao: {{ $entre->cartao->nome }} - data: {{ $entre->data->format('d/m/y') }} - usuario: {{ $entre->usuario }}
    </li>

    <br>
@empty
    nao tem relatorio nesse periodo
@endforelse

<h3>Valor total da fatura: {{$somaFatura}}</h3> 
<H3>Dia do pagamento {{$diaPagamento}}</H3>
<h3>Fatura do mes: {{$somenteMesAtualSelecionado}}</h3>
