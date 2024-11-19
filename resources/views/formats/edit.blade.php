@extends('layouts.app')

@section('title', 'Editar Formato')

@section('content')
    <h1>Editar Formato</h1>

    <form action="{{ route('formats.update', $format->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome do Formato:</label><br>
        <input type="text" name="name" id="name" value="{{ $format->name }}" required><br><br>
        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <div class="center-link">
    <a href="{{ route('formats.index') }}">Voltar à Lista</a>
    </div>
@endsection
