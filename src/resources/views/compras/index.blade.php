<html>
  <head>
    <meta charset="utf-8">
    <title>Adicionar compras</title>
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
    <div class="card container w-25">
        <h4 class="card-title text-center">Criar uma compra</h4>

        <form action="{{route('criar_compras')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="descricao" >Descrição</label>
                <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" placeholder="Ex: Hamburgueria">
                @error('descricao')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
                <br>
            </div>

            <div class="form-group">
                <label for="categoria_id" >Selecione a categoria</label>
                <br>
                <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id">
                    <option value="">Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                </select>  
                @error('categoria_id')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <br>
                <label for="valor" >Valor da compra</label>
                <input type="money" class="form-control @error('valor') is-invalid @enderror" name="valor" placeholder="R$ 00,00">
                @error('valor')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <br>
                <label for="cartao_id" >Selecione o cartão</label>
                <select class="form-control @error('cartao_id') is-invalid @enderror" name="cartao_id">
                    <option value="">Cartão</option>
                        @foreach ($cartoes as $cartao)
                            <option value="{{ $cartao->id }}">{{ $cartao->nome }}</option>
                        @endforeach
                </select>
                @error('cartao_id')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
        
            <div class="form-group">
                <br>
                <label for="data" >Selecione uma data</label>
                <input type="date" class="form-control @error('data') is-invalid @enderror" name="data" placeholder="data">
                @error('data')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
        
            <div class="form-group">
                <br>
                <label for="usuario" >Nome de usuario</label>
                <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" placeholder="Usuário">
                @error('usuario')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
                <br>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

        </form>
    </div>

  </body>
</html>