@extends('layouts.app')

@section('title', 'Editar Disco')

@section('content')
    <h1>Editar Disco</h1>

    <form action="{{ route('discs.update', $disc->id) }}" method="POST" enctype="multipart/form-data"> <!-- Adicionado enctype -->
        @csrf
        @method('PUT')

        <label for="title">Título:</label><br>
        <input type="text" name="title" id="title" value="{{ $disc->title }}" required><br><br>

        <label for="price">Preço:</label><br>
        <input type="number" name="price" id="price" step="0.01" value="{{ $disc->price }}" required><br><br>

        <label for="genre_id">Gênero:</label><br>
        <select name="genre_id" id="genre_id" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $genre->id == $disc->genre_id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="artist_id">Artista:</label><br>
        <select name="artist_id" id="artist_id" required>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" {{ $artist->id == $disc->artist_id ? 'selected' : '' }}>
                    {{ $artist->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="format_id">Formato:</label><br>
        <select name="format_id" id="format_id" required>
            @foreach($formats as $format)
                <option value="{{ $format->id }}" {{ $format->id == $disc->format_id ? 'selected' : '' }}>
                    {{ $format->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="cover_image">Capa Atual:</label><br>
        @if($disc->cover_image)
            <img src="{{ asset('storage/' . $disc->cover_image) }}" alt="Capa de {{ $disc->title }}" style="max-width: 200px; height: auto;"><br><br>
        @else
            <p>Sem capa disponível.</p><br>
        @endif

      
        <label for="cover_image">Nova Capa (opcional):</label><br>
        <input type="file" name="cover_image" id="cover_image" accept="image/*"><br><br>

        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <div class="center-link">
        <a href="{{ route('discs.index') }}">Voltar à Lista</a>
    </div>
@endsection
