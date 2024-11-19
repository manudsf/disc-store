@extends('layouts.app')

@section('title', 'Detalhes do Gênero')

@section('content')
    <div class="show-container">
        <h1>Detalhes do Gênero</h1>

        <div class="info-box">
            <p><strong>ID:</strong> {{ $genre->id }}</p>
            <p><strong>Nome:</strong> {{ $genre->name }}</p>
        </div>

        <div class="center-link">
            <a href="{{ route('genres.index') }}" class="action-button">Voltar à Lista</a>
        </div>
    </div>
@endsection
