@extends('layouts.app')

@section('title', 'Editar Artista')

@section('content')
    <h1>Editar Artista</h1>

    <form action="{{ route('artists.update', $artist->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome do Artista:</label><br>
        <input type="text" name="name" id="name" value="{{ $artist->name }}" required><br><br>
        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <div class="center-link">
    <a href="{{ route('artists.index') }}">Voltar à Lista</a>
</div>

@endsection
