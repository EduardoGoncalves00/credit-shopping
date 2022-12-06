@extends('base.layoutPdf')
@section('titulo', "Relatorio em PDF")

@section('conteudo')

    <div class="invalid-feedaback text-danger">
        <h4 class="card-title text-center">Fatura do mes: {{$somenteMesAtualSelecionado}}</h4>  
        <h4 class="card-title text-center">Vencimento no dia: {{$diaPagamento}}</h4> 
        <h4 class="card-title text-center">Valor total da fatura: R$ {{number_format($totalFatura,2,",",".")}}</h4>      
    </div>

    <table class="container table table-bordered">

        <thead>
            <tr>
                <th scope="col">Descricão</th>
                <th scope="col">Categoria</th>
                <th scope="col">Valor</th>
                <th scope="col">Cartão</th>
                <th scope="col">Data</th>
                <th scope="col">Nome do comprador</th>
            </tr>
        </thead>
        <tbody>  
            
            @forelse ($fatura as $faturaPuxada)
                <tr>
                    <td>{{ $faturaPuxada->descricao }}</td>
                    <td>{{ $faturaPuxada->categoria->nome }}</td>
                    <td>R$ {{number_format($faturaPuxada->valor,2,",",".")}}</td>
                    <td>{{ $faturaPuxada->cartao->nome }}</td>
                    <td>{{ $faturaPuxada->data->format('d/m/y') }}</td>
                    <td>{{ $faturaPuxada->usuario }}</td>
                </tr>  
            @empty
                <h4 class="card-title text-center">Não hà relatorio nesse periodo.</h4>      
            @endforelse
        </tbody>

    </table>
@endsection