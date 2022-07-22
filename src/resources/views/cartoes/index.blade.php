<a href='{{ route('criar_cartoes') }}'>clique aqui para criar um cartao</a>

<br>
<br>

<h2>listagem dos cartoes</h2>
<br>

@forelse ($cartoes as $cartao)
    <br>
    <li>
        id: {{ $cartao->id }} - nome do cartao: {{ $cartao->nome }} - dia de pagamento: {{ $cartao->dia_pagamento }} - dia do fechamento: {{ $cartao->dia_fechamento }} - nome do banco: {{ $cartao->banco }}
    
        <form action="{{route('deletar_cartoes', $cartao->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Excluir</button>
        </form>

        <a href='{{ route('editar_cartoes', $cartao->id) }}'> Editar</a>

    </li>
    
    
@empty
    <p>Nao ha cartoes registrados</p>
    
@endforelse