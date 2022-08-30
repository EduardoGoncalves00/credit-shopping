<html>
    <head>
      <meta charset="utf-8">
      <title>Relatorio</title>
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

        <table class="container w-50 table table-bordered">
            
            @forelse ($relatorio as $relatorioPuxado)

                <thead>
                    <tr>
                        <th scope="col">Descricão</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Cartão</th>
                        <th scope="col">Data</th>
                        <th scope="col">Usuário</th>
                    </tr>
                </thead>
                <tbody>        
                    <tr>
                        <td>{{ $relatorioPuxado->descricao }}</td>
                        <td>{{ $relatorioPuxado->categoria->nome }}</td>
                        <td>{{ $relatorioPuxado->valor }}</td>
                        <td>{{ $relatorioPuxado->cartao->nome }}</td>
                        <td>{{ $relatorioPuxado->data->format('d/m/y') }}</td>
                        <td>{{ $relatorioPuxado->usuario }}</td>
                    </tr>
                </tbody>

                <div class="invalid-feedaback text-danger">
                    <h4 class="card-title text-center">Fatura do mes: {{$somenteMesAtualSelecionado}}</h4>  
                    <h4 class="card-title text-center">Vencimento no dia: {{$diaPagamento}}</h4> 
                    <h4 class="card-title text-center">Valor total da fatura: R$ {{$somaFatura}}</h4>      
                    <br>
                </div>
            @empty
            <h4 class="card-title text-center">Não hà relatorio nesse periodo.</h4>      
            @endforelse
                
        </table>

    </body>
</html>