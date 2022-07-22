<a href='{{ route('cartoes') }}'>clique aqui para listar todos cartoes</a>

<H2>Edite o cartão!</H2>

<form action="{{route('atualizar_cartoes', $cartao->id)}}" method="post">
    <br>
    @csrf
    @method('PUT')

    <div class="form-group">Novo nome
      <input type="text" class="form-control" value="{{ $cartao->nome }}" name="nome" >
    </div>
        <br>

    <div class="form-group">Novo dia de pagamento
        <input type="number" class="form-control" value="{{ $cartao->dia_pagamento }}" name="dia_pagamento">
    </div>
        <br>

    <div class="form-group">Novo dia de fechamento
        <input type="number" class="form-control" value="{{ $cartao->dia_fechamento }}" name="dia_fechamento">
    </div>
        <br>

    <div class="form-group">Novo banco
        <input type="text" class="form-control" value="{{ $cartao->banco }}" name="banco">
    </div>
        <br>

    <button type="submit" class="btn btn-primary">Salvar novas alteracoes</button>
</form>