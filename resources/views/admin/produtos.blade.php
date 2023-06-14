@extends('admin.layout')
@section('titulo', 'Produtos')
@section('conteudo')

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
            <i class="large material-icons">add</i>
        </a>
    </div>

    @include('admin.produtos.create')

    <div class="row container crud">

        <div class="row titulo ">
            <h1 class="left">Produtos</h1>
            <span class="right chip">{{ $produtos->count() }} produtos exibidos nesta página</span>
        </div>

        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
                <form>
                    <div class="input-field">
                        <input placeholder="Pesquisar..." id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>

        <div class="card z-depth-4 registros">
            @include('admin.includes.mensagens')
            <table class="striped ">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Produto</th>

                        <th>Preço</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($produtos as $produto)
                    <tr>
                        <td><img src="{{ url("storage/{$produto->imagem}") }}" class="circle"></td>
                        <td>#{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->categoria->nome }}</td>
                        <td>
                            <a href="#update-{{ $produto->id }}" class="btn-floating waves-effect waves-light orange modal-trigger"
                                data-target="modal-edit-{{ $produto->id }}">
                                <i class="material-icons">mode_edit</i>
                            </a>
                            <a href="#delete-{{ $produto->id }}" class="btn-floating modal-trigger waves-effect waves-light red">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                    @include('admin.produtos.delete')
                
                    <!-- Edit Modal -->
                    <div id="modal-edit-{{ $produto->id }}" class="modal">
                        <div class="modal-content">
                            <!-- Add your edit form here -->
                            <!-- For example: -->
                            <form action="{{route('admin.produto.update', $produto->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Add your form fields here -->
                                <!-- For example: -->
                                <input type="text" name="nome" value="{{ $produto->nome }}" required>
                                <input type="number" name="preco" value="{{ $produto->preco }}" required>
                                <input type="text" name="descricao" value="{{ $produto->descricao }}" required>
                                <input type="text" name="imagem" value="{{ $produto->imagem }}">
                                <!-- Add more fields if needed -->
                                <button type="submit" class="btn">Editar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                

                </tbody>
            </table>
        </div>

        <div class="row center">
            {{ $produtos->links('custom.pagination') }}
        </div>
    </div>
@endsection
