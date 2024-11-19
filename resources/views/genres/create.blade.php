@extends('layouts.app')

@section('title', 'Adicionar Gênero')

@section('content')
    <h1>Adicionar Novo Gênero</h1>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <label for="name">Nome do Gênero:</label><br>
        <input type="text" name="name" id="name" required><br><br>
        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <a href="{{ route('genres.index') }}">Voltar à Lista</a>
@endsection
