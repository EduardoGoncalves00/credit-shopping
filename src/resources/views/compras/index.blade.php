<h3>Criar uma compra</h3>

<form action="{{route('criar_compras')}}" method="POST">
    @csrf
    <br>
    <div class="form-group">
      <input type="text" class="form-control" name="descricao" placeholder="descricao">
    </div>

    <div class="form-group">
        {{-- <input type="number" class="form-control" name="categoria_id" placeholder="categoria_id"> --}}

        <select name="categoria_id">
            <option value="">Selecione categoria_id</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="int" class="form-control" name="valor" placeholder="valor">
    </div>

    <div class="form-group">
        {{-- <input type="number" class="form-control" name="cartao_id" placeholder="cartao_id"> --}}
    <select name="cartao_id">
        <option value="">Selecione cartao_id</option>
            @foreach ($cartoes as $cartao)
                <option value="{{ $cartao->id }}">{{ $cartao->nome }}</option>
            @endforeach
    </select>
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

<a href='{{ route('lista') }}'>Ver lista de compras</a>
