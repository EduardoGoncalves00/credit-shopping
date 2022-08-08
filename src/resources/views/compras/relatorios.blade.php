<a href='{{ route('compras') }}'>Voltar para as adiconar as compras</a>

<br>

<a href='{{ route('compras') }}'>Voltar para as listas de compras</a>


<h2>Puxar relatorios de compras</h2>

<form action="{{route('puxar_relatorio')}}" method="POST">
    @csrf
    <select name="cartao_id">
      <option value="">Selecione cartao_id</option>
          @foreach ($cartoes as $cartao)
              <option value="{{ $cartao->id }}">{{ $cartao->nome }}</option>
          @endforeach
    </select>

    {{-- <div class="form-group">
      <input type="date" class="form-control" name="data">
    </div> --}}

    <div class="form-group">
      <input type="month" class="form-control" name="data">
    </div>
    
    <button type="submit" class="btn btn-primary">Consultar relatorio</button>
</form>

