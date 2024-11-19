@extends('layouts.app')

@section('title', 'Adicionar Disco')

@section('content')
    <h1>Adicionar Novo Disco</h1>

    <!-- Formulário de criação -->
    <form action="{{ route('discs.store') }}" method="POST" enctype="multipart/form-data"> <!-- Adicionado enctype -->
        @csrf
        <label for="title">Título:</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="price">Preço:</label><br>
        <input type="number" name="price" id="price" step="0.01" required><br><br>

        <label for="genre_id">Gênero:</label><br>
        <select name="genre_id" id="genre_id" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select><br><br>

        <label for="artist_id">Artista:</label><br>
        <select name="artist_id" id="artist_id" required>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
            @endforeach
        </select><br><br>

        <label for="format_id">Formato:</label><br>
        <select name="format_id" id="format_id" required>
            @foreach($formats as $format)
                <option value="{{ $format->id }}">{{ $format->name }}</option>
            @endforeach
        </select><br><br>

        <label for="cover_image">Capa do Disco:</label><br>
        <input type="file" name="cover_image" id="cover_image" accept="image/*"><br><br>

        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <a href="{{ route('discs.index') }}">Voltar à Lista</a>
@endsection
