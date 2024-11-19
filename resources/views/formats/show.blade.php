@extends('layouts.app')

@section('title', 'Detalhes do Formato')

@section('content')
    <h1>Detalhes do Formato</h1>

    <p><strong>ID:</strong> {{ $format->id }}</p>
    <p><strong>Nome:</strong> {{ $format->name }}</p>

    <br>
    <a href="{{ route('formats.index') }}">Voltar à Lista</a>
@endsection
