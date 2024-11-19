@extends('layouts.app')

@section('title', 'Adicionar Artista')

@section('content')
    <h1>Adicionar Novo Artista</h1>

    <form action="{{ route('artists.store') }}" method="POST">
        @csrf
        <label for="name">Nome do Artista:</label><br>
        <input type="text" name="name" id="name" required><br><br>
        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <a href="{{ route('artists.index') }}">Voltar à Lista</a>
@endsection
