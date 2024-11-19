@extends('layouts.app')

@section('title', 'Adicionar Cliente')

@section('content')
    <h1>Adicionar Novo Cliente</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="phone">Telefone:</label><br>
        <input type="text" name="phone" id="phone"><br><br>

        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <a href="{{ route('customers.index') }}" class="action-button">Voltar à Lista</a>
@endsection
