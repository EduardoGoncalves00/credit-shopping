<h3>Lista de compras</h3>

@forelse ($compras as $compra)

    <li>
        id: {{ $compra->id }} -  descricao: {{ $compra->descricao }} - categoria: {{ $compra->categoria->nome }} - valor: {{ $compra->valor }} - cartao: {{ $compra->cartao->nome }} - data: {{ $compra->data->format('d/m/y') }} - usuario: {{ $compra->usuario }}

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

<br>

<a href='{{ route('relatorios') }}'>Ver faturas</a>

<br>

<a href='{{ route('compras') }}'>Criar compras</a>

