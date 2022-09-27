@extends('base.layout')
@section('titulo', "Relatorio")

@section('conteudo')
        <br>

        <table class="container w-50 table table-bordered">
            
            <thead>
                <tr>
                    <th scope="col">Descricão</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Cartão</th>
                    <th scope="col">Data</th>
                    <th scope="col">Usuário</th>
                </tr>
            </thead>
            <tbody>  

                <div class="invalid-feedaback text-danger">
                    <h4 class="card-title text-center">Fatura do mes: {{$somenteMesAtualSelecionado}}</h4>  
                    <h4 class="card-title text-center">Vencimento no dia: {{$diaPagamento}}</h4> 
                    <h4 class="card-title text-center">Valor total da fatura: R$ {{$totalFatura}}</h4>      
                    <br>
                </div>
             
                @forelse ($fatura as $faturaPuxada)
                    <tr>
                        <td>{{ $faturaPuxada->descricao }}</td>
                        <td>{{ $faturaPuxada->categoria->nome }}</td>
                        <td>{{ $faturaPuxada->valor }}</td>
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