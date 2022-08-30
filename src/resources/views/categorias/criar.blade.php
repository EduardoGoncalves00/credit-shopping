@extends('base.layout')
@section('titulo', "Criar categorias")

@section('conteudo')
    <br>
    <div class="card container w-25">
        <h4 class="card-title text-center">Criar categoria</h4>

        <form action="{{route('criar_categorias')}}" method="POST">
          @csrf
          <div class="form-group @error('nome') is-invalid @enderror">
            <label for="nome" >Nome da categoria</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Mercado">
            @error('nome')
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