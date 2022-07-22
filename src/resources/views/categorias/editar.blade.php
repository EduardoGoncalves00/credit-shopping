<a href='{{ route('categorias') }}'>Ver todas categorias</a>

<h3>Alterar categoria</h3>

<form action="{{route('atualizar_categorias', $categoria->id)}}" method="post">
    @csrf
    @method('PUT')
    <br>
    <div class="form-group">
      <input type="text" class="form-control" value={{ $categoria->nome }} name="nome">
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar novas alteraçoes</button>
</form>