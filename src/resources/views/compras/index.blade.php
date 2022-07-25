<h3>Criar uma compra</h3>

<form action="{{route('criar_compras')}}" method="POST">
    @csrf
    <br>
    <div class="form-group">
      <input type="text" class="form-control" name="descricao" placeholder="descricao">
    </div>

    <div class="form-group">
        <input type="number" class="form-control" name="categoria_id" placeholder="categoria_id">
    </div>

    <div class="form-group">
        <input type="number" class="form-control" name="valor" placeholder="valor">
    </div>

    <div class="form-group">
        <input type="number" class="form-control" name="cartao_id" placeholder="cartao_id">
      </div>
  
      <div class="form-group">
          <input type="date" class="form-control" name="data" placeholder="data">
      </div>
  
      <div class="form-group">
          <input type="text" class="form-control" name="usuario" placeholder="usuario">
      </div>

    
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<br>

<h3>Lista de compras</h3>

@forelse ($compras as $compra)

    <li>
        id: {{ $compra->id }} -  descricao: {{ $compra->descricao }} - categoria_id: {{ $compra->categoria_id }} - valor: {{ $compra->valor }} - cartao_id: {{ $compra->cartao_id }} - data: {{ $compra->data }} - usuario: {{ $compra->usuario }}

        <form action="{{ route('deletar_compras', $compra->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Deletar</button>
        </form>

        <a href= '{{ route('editar_compras', $compra->id) }}' >Atualizar</a>

    </li>
    <br>

@empty
    nao tem compras
@endforelse


