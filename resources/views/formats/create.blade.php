@extends('layouts.app')

@section('title', 'Adicionar Formato')

@section('content')
    <h1>Adicionar Novo Formato</h1>

    <form action="{{ route('formats.store') }}" method="POST">
        @csrf
        <label for="name">Nome do Formato:</label><br>
        <input type="text" name="name" id="name" required><br><br>
        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <a href="{{ route('formats.index') }}">Voltar à Lista</a>
@endsection
