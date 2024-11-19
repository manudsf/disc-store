@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <h1>Editar Cliente</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="{{ $customer->name }}" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ $customer->email }}" required><br><br>

        <label for="phone">Telefone:</label><br>
        <input type="text" name="phone" id="phone" value="{{ $customer->phone }}"><br><br>

        <button type="submit" class="action-button save">Atualizar</button>
    </form>

    <br>
    <a href="{{ route('customers.index') }}" class="action-button">Voltar à Lista</a>
@endsection
