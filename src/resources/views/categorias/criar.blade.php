<html>
  <head>
    <meta charset="utf-8">
    <title>Criar categoria</title>
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
        <h4 class="card-title text-center">Criar categoria</h4>

        <form action="{{route('criar_categorias')}}" method="POST">
          @csrf
          <div class="form-group @error('nome') is-invalid @enderror">
            <label for="nome" >Nome da categoria</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Mercado">
            @error('nome')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
          </div>
          <br>
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>  
    </div>

  </body>
</html>