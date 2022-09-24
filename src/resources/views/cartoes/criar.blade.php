@extends('base.layout')
@section('titulo', "Criar cartão")

@section('conteudo')
<br>
<div class="card container w-25">
    <h4 class="card-title text-center">Criar cartão</h4>

    <form action="{{route('store_card')}}" method="POST">
        @csrf
        <div class="form-group @error('nome') is-invalid @enderror">
            <label for="nome" >Nome do cartão</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Itau - Eduardo">
            @error('nome')
            <div class="invalid-feedaback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group @error('dia_pagamento') is-invalid @enderror">
            <label for="dia_pagamento" >Dia de pagamento</label>
            <input type="number" class="form-control" name="dia_pagamento" placeholder="Ex: 10">
            @error('dia_pagamento')
            <div class="invalid-feedaback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group @error('dia_fechamento') is-invalid @enderror">
            <label for="dia_fechamento" >Dia de fechamento</label>
            <input type="number" class="form-control" name="dia_fechamento" placeholder="Ex: 03">
            @error('dia_fechamento')
            <div class="invalid-feedaback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group @error('banco') is-invalid @enderror">
            <label for="banco" >Banco</label>
            <input type="text" class="form-control" name="banco" placeholder="Ex: Itau">
            @error('banco')
            <div class="invalid-feedaback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

        <br>
    </form>
</div>
@endsection