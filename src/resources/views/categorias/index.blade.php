<html>
    <head>
      <meta charset="utf-8">
      <title>Listagem de categorias</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <style>

        .dropbtn {
            background-color: transparent;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1;}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: transparent;
        }

      </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
            <div class="dropdown">
                <button class="dropbtn">COMPRAS</button>
                <div class="dropdown-content" style="left:0;">
                    <a href='{{ route('lista') }}'>Lista de compras</a>
                    <a href='{{ route('compras') }}'>Criar compra</a>
                    <a href='{{ route('relatorios') }}'>Relatório</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">CARTÕES</button>
                <div class="dropdown-content" style="left:0;">
                    <a href='{{ route('cartoes') }}'>Lista de cartões</a>
                    <a href='{{ route('criar_cartoes') }}'>Criar cartão</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">CATEGORIAS</button>
                <div class="dropdown-content" style="left:0;">
                    <a href='{{ route('categorias') }}'>Lista de categorias</a>
                </div>
            </div>
        </nav>
        
        <br>

        <table class="container w-75 table table-bordered">

            <h4 class="card-title text-center">Listagem de categorias</h4>

                <thead>
                    <tr>
                        <th scope="col">Nome do cartão</th>
                        <th class="text-center" scope="col">Atualizar</th>
                        <th class="text-center" scope="col">Deletar</th>
                    </tr>
                </thead>

                @forelse ($categoria as $categorias)

                <tbody>
                    <tr>
                        <td>{{ $categorias->nome }}</td>
                        <td>       
                            <a href= '{{ route('editar_categorias', $categorias->id) }}'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="container bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href= '{{ route('deletar_categorias', $categorias->id) }}'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="container bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            @empty
                <h4 class="card-title text-center">Não hà cartões registrados.</h4>      
            @endforelse

        </table>
    </body>
</html>