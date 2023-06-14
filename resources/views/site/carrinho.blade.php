@extends('site.layout')
@section('title', 'Carrinho')

@section('conteudo')
  <div class="row container">

    @if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Parabéns</span>
              <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif

    @if ($mensagem = Session::get('aviso'))
        <div class="card blue">
            <div class="card-content white-text">
            <span class="card-title">Tudo bem!</span>
            <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif

    @if($itens->count() == 0)
        <div class="card orange">
            <div class="card-content white-text">
            <span class="card-title">Seu carrinho está vazio</span>
            <p>Aproveite nossas promoções!</p>
            </div>
        </div>
    @else
    <h3>Seu carrinho possuí: {{$itens->count()}} produtos</h3>
    
    <table class="stripped">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
                <tr>
                    <td>
                        <img src="{{$item->attributes->img}}" alt="Imagem do produto do carrinho" class="responsive-img circle" width="70">
                    </td>
                    <td>{{$item->name}}</td>
                    <td><b>R${{ number_format($item->price, 2, ',', '.') }}</b></td>
                    {{-- BTN ATUALIZAR --}}
                    <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$item->id}}" name="id" min="1">
                    <td><input class="white center" style="width: 40px; font-weight: 900;" type="number" name="quantity" value={{$item->quantity}}""></td>
                    <td>
                        <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                        </form>

                        {{-- BTN REMOVER --}}
                        <form action="{{route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$item->id}}" name="id">
                            <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card blue">
        <div class="card-content white-text">
        <p>Valor total do carrinho</p>
        <span class="card-title"><b>R${{ number_format(\Cart::getTotal(), 2, ',', '.') }}</b></span>
        </div>
    </div>

    @endif

        <div class="row container center">
            <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>
            <a href="{{route('site.limparcarrinho')}}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>
            <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>
        </div>

  </div>

 
@endsection
