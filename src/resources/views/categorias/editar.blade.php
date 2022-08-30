@extends('base.layout')
@section('titulo', "Alterar categoria")

@section('conteudo')
    <br>
    <div class="card container w-25">
      <h4 class="card-title text-center">Alterar categoria</h4>

      <form action="{{route('atualizar_categorias', $categoria->id)}}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group @error('nome') is-invalid @enderror">
            <label for="nome" >Nome da categoria</label>
            <input type="text" class="form-control" value={{ $categoria->nome }} name="nome">
            @error('nome')
            <div class="invalid-feedaback text-danger">
                {{$message}}
            </div>
            @enderror
          </div>
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar novas alteraçoes</button>
          </div>
          <br>
      </form>   
    </div>
@endsection