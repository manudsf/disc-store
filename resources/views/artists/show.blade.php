@extends('layouts.app')

@section('title', 'Detalhes do Artista')

@section('content')
    <div class="show-container">
        <h1>Detalhes do Artista</h1>

        <div class="info-box">
            <p><strong>ID:</strong> {{ $artist->id }}</p>
            <p><strong>Nome:</strong> {{ $artist->name }}</p>
        </div>

        <div class="center-link">
            <a href="{{ route('artists.index') }}" class="action-button">Voltar à Lista</a>
        </div>
    </div>
@endsection
