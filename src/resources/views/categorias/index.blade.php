<a href='{{ route('criar_categoria') }}'>Criar uma categoria</a>

<h3>Listagem das categorias</h3>

@forelse ($categoria as $categorias)
    <br>
    <li>
        {{$categorias->nome }}
    
        <form action="{{ route('deletar_categorias', $categorias->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Excluir</button>
        </form>

        <a href='{{ route('editar_categorias', $categorias->id) }}'> Editar</a>
        
    </li>
@empty
    <p>Nao ha cartoes registrados</p>
@endforelse