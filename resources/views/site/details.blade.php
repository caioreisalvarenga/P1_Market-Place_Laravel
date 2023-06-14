@extends('site.layout')
@section('title', 'Detalhes')

@section('conteudo')
    <div class="row container"> <br>
        <div class="col s12 m6">
            <img src="{{ $produto->imagem }}" alt="Imagem do produto" class="responsive-img">
        </div>

        <div class="col s12 m6">
            <h3>{{ $produto->nome }}</h3>
            <p>{{ $produto->descricao }}</p>
            <p>
                <b>Postado por: </b> {{ $produto->user->firstName }} <br/>
                <b>Categoria: </b> {{ $produto->categoria->nome }}
            </p>
            <h5> <b>R${{ number_format($produto->preco, 2, ',', '.') }}</b></h5>

            <form action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <input type="number" name="qnt" value="1" min="1">
                <input type="hidden" name="img" value="{{ $produto->imagem }}">
                <button class="btn orange btn-large" >Comprar</button>
            </form>
        </div>
    </div>
@endsection