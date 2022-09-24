@extends('base.layout')
@section('titulo', "Editar cartão")

@section('conteudo')
    <br>
    <div class="card container w-25 " >
        <h4 class="card-title text-center">Edite o cartão!</h4>

        <form action="{{route('update_card', $cartao->id)}}" method="post">
            @csrf
            @method('PUT')
        
            <div class="form-group @error('nome') is-invalid @enderror">
                <label for="nome" >Novo nome</label>
                <input type="text" class="form-control" value="{{ $cartao->nome }}" name="nome" >
                @error('nome')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>        
            <div class="form-group @error('dia_pagamento') is-invalid @enderror">
                <label for="dia_pagamento" >Novo dia de pagamento</label>
                <input type="number" class="form-control" value="{{ $cartao->dia_pagamento }}" name="dia_pagamento">
                @error('dia_pagamento')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>        
            <div class="form-group @error('dia_fechamento') is-invalid @enderror">
                <label for="dia_fechamento" >Novo dia de fechamento</label>
                <input type="number" class="form-control" value="{{ $cartao->dia_fechamento }}" name="dia_fechamento">
                @error('dia_fechamento')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>        
            <div class="form-group @error('banco') is-invalid @enderror">
                <label for="banco" >Novo banco</label>
                <input type="text" class="form-control" value="{{ $cartao->banco }}" name="banco">
                @error('banco')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salvar alterações</button>
            </div>

            <br
        </form>
    </div>
@endsection