@extends('layouts.app')
@section('content')

    <h1>Home Page</h1>
    <hr>
    @foreach($produtos as $produto)
    <div>
        <h2>{{ $produto->nome }}</h2>
        <p>{{ $produto->descricao }}</p>
        <p>{{ $produto->exibirValorFormatado() }}</p>
    </div>
    @endforeach
<div class="row" >
    <div class="col-md-6">
        <h2>Produtos</h2>
        <ul>
            @foreach($produtos as $produto)
                <li>{{ $produto->nome }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-6">
        <h2>Categorias</h2>

    </div>
@endsection