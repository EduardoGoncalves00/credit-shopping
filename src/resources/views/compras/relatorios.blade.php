@extends('base.layout')
@section('titulo', "Relatorio de compra")

@section('conteudo')
    <br>

    <div class="card container w-25">

      <form action="{{route('viewInvoice')}}" method="POST">

        <br>

        <h5 class="card-title text-center">Puxar relatorios de compras</h5>

        @csrf
        <div class="form-group">
          <label for="cartao_id" >Selecione o cartão</label>
          <select class="form-control @error('cartao_id') is-invalid @enderror" name="cartao_id">
              <option disabled value="">Cartão</option>
                  @foreach ($cartoes as $cartao)
                      <option value="{{ $cartao->id }}">{{ $cartao->nome }}</option>
                  @endforeach
          </select>
          @error('cartao_id')
          <div class="invalid-feedaback text-danger">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="data" >Selecione o periodo</label>
          <input type="month" class="form-control @error('data') is-invalid @enderror" name="data" placeholder="data">
          @error('cartao_id')
          <div class="invalid-feedaback text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Consultar relatório</button>
        </div>
        
        <br>
      </form>
    </div>
@endsection