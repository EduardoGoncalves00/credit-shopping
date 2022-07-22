<a href='{{ route('categorias') }}'>Ver todas categorias</a>

<form action="{{route('criar_categorias')}}" method="POST">
    @csrf
    <br>
    <div class="form-group">
      <input type="text" class="form-control" name="nome" placeholder="Nome da categoria">
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>