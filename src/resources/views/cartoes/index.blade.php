<a href='{{ route('criar_cartoes') }}'>clique aqui para criar um cartao</a>

<br>

listagem dos cartoes

@forelse ($cartoes as $cartao)
    <li>nome do cartao: {{ $cartao->nome }} - dia de pagamento: {{ $cartao->dia_pagamento }} - dia do fechamento: {{ $cartao->dia_fechamento }} - nome do banco: {{ $cartao->banco }}</li>
    
@empty
    <p>Nao ha cartoes registrados</p>
    
@endforelse