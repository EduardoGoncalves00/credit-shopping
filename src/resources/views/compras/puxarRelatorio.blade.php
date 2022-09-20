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
                    <h4 class="card-title text-center">Valor total da fatura: R$ {{$somaFatura}}</h4>      
                    <br>
                </div>

                @forelse ($relatorio as $relatorioPuxado)
                    <tr>
                        <td>{{ $relatorioPuxado->descricao }}</td>
                        <td>{{ $relatorioPuxado->categoria->nome }}</td>
                        <td>{{ $relatorioPuxado->valor }}</td>
                        <td>{{ $relatorioPuxado->cartao->nome }}</td>
                        <td>{{ $relatorioPuxado->data->format('d/m/y') }}</td>
                        <td>{{ $relatorioPuxado->usuario }}</td>
                    </tr>  
                @empty
                    <h4 class="card-title text-center">Não hà relatorio nesse periodo.</h4>      
                @endforelse
            </tbody>

        </table>
@endsection