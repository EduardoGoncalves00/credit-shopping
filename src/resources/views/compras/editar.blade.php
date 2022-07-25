<h3>Editar a compra</h3>

<form action="{{route('atualizar_compras', $compra->id)}}" method="post">
    @csrf
    @method('PUT')
    <br>
    <div class="form-group">
      <input type="text" class="form-control"  value="{{ $compra->descricao }}" name="descricao">
    </div>

    <div class="form-group">
        <input type="number" class="form-control" value="{{ $compra->categoria_id }}" name="categoria_id">
    </div>

    <div class="form-group">
        <input type="number" class="form-control" value="{{ $compra->valor }}" name="valor">
    </div>

    <div class="form-group">
        <input type="number" class="form-control" value="{{ $compra->cartao_id }}" name="cartao_id">
      </div>
  
      <div class="form-group">
          <input type="date" class="form-control" value="{{ $compra->data }}" name="data">
      </div>
  
      <div class="form-group">
          <input type="text" class="form-control" value="{{ $compra->usuario }}" name="usuario">
      </div>

    
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
