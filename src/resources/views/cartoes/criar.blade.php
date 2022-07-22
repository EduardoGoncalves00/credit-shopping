<a href='{{ route('cartoes') }}'>clique aqui para listar todos cartoes</a>


<form action="{{route('criar_cartao')}}" method="POST">
    <br>
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" name="nome" placeholder="Nome do cartão">
    </div>
    <br>
    <div class="form-group">
        <input type="number" class="form-control" name="dia_pagamento" placeholder="Dia de pagamento">
    </div>
    <br>
    <div class="form-group">
        <input type="number" class="form-control" name="dia_fechamento" placeholder="Dia de fechamento">
    </div>
    <br>
    <div class="form-group">
        <input type="text" class="form-control" name="banco" placeholder="Banco">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>