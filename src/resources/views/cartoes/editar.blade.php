<html>
  <head>
    <meta charset="utf-8">
    <title>Atualizar o cartão</title>
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
    <div class="card container w-25 " >
        <h4 class="card-title text-center">Edite o cartão!</h4>

        <form action="{{route('atualizar_cartoes', $cartao->id)}}" method="post">
            <br>
            @csrf
            @method('PUT')
        
            <div class="form-group @error('nome') is-invalid @enderror">
                <label for="nome" >Novo nome</label>
                <input type="text" class="form-control" value="{{ $cartao->nome }}" name="nome" >
                @error('nome')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
                <br>
        
            <div class="form-group @error('dia_pagamento') is-invalid @enderror">
                <label for="dia_pagamento" >Novo dia de pagamento</label>
                <input type="number" class="form-control" value="{{ $cartao->dia_pagamento }}" name="dia_pagamento">
                @error('dia_pagamento')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
                <br>
        
            <div class="form-group @error('dia_fechamento') is-invalid @enderror">
                <label for="dia_fechamento" >Novo dia de fechamento</label>
                <input type="number" class="form-control" value="{{ $cartao->dia_fechamento }}" name="dia_fechamento">
                @error('dia_fechamento')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
                <br>
        
            <div class="form-group @error('banco') is-invalid @enderror">
                <label for="banco" >Novo banco</label>
                <input type="text" class="form-control" value="{{ $cartao->banco }}" name="banco">
                @error('banco')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
                <br>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salvar alterações</button>
            </div>
        </form>
    </div>
  </body>
</html>
