@extends('layouts.app')

@section('title', 'Editar Gênero')

@section('content')
    <h1>Editar Gênero</h1>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome do Gênero:</label><br>
        <input type="text" name="name" id="name" value="{{ $genre->name }}" required><br><br>
        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <div class="center-link">
    <a href="{{ route('genres.index') }}">Voltar à Lista</a>
    </div>
@endsection
