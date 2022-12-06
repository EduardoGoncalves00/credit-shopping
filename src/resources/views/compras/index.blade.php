@extends('base.layout')
@section('titulo', "Criar uma compra")

@section('conteudo')    
    <br>
    <div class="card container w-25">
        <h4 class="card-title text-center">Criar uma compra</h4>

        <form action="{{route('store_shopping')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="descricao" >Descrição</label>
                <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" placeholder="Ex: Hamburgueria">
                @error('descricao')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria_id" >Selecione a categoria</label>
                <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id">
                    <option disabled value="">Categoria</option>
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
                <label for="valor" >Valor da compra</label>
                <input type="money" class="form-control @error('valor') is-invalid @enderror" name="valor" placeholder="R$ 00,00">
                @error('valor')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="parcela" >Numero de parcelas</label>
                <input type="decimal" class="form-control @error('parcela') is-invalid @enderror" name="parcela" placeholder="01">
                @error('parcela')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cartao_id" >Selecione o cartão</label>
                <select class="form-control @error('cartao_id') is-invalid @enderror" name="cartao_id">
                    <option disabled value="">Cartão</option>
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
                <label for="data" >Selecione uma data</label>
                <input type="date" class="form-control @error('data') is-invalid @enderror" name="data" placeholder="data">
                @error('data')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="usuario" >Nome do comprador</label>
                <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" placeholder="Usuário">
                @error('usuario')
                <div class="invalid-feedaback text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

            <br>
        </form>
    </div>
@endsection