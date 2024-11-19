@extends('layouts.app')

@section('title', 'Detalhes do Disco')

@section('content')
    <div class="show-container">
        <h1>Detalhes do Disco</h1>

        <div class="info-box">
            <p><strong>ID:</strong> {{ $disc->id }}</p>
            <p><strong>Título:</strong> {{ $disc->title }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($disc->price, 2, ',', '.') }}</p>
            <p><strong>Gênero:</strong> {{ $disc->genre->name }}</p>
            <p><strong>Artista:</strong> {{ $disc->artist->name }}</p>
            <p><strong>Formato:</strong> {{ $disc->format->name }}</p>
        </div>

        <div class="image-box">
        @if($disc->cover_image)
    <img src="{{ asset('storage/' . $disc->cover_image) }}" alt="Capa do Disco" class="disc-image">
       @else
    <p>Imagem não disponível.</p>
       @endif

        </div>

        <div class="center-link">
            <a href="{{ route('discs.index') }}" class="action-button">Voltar à Lista</a>
        </div>
    </div>
@endsection
