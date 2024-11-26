@extends('layouts.app')

@section('title', 'Adicionar Cliente')

@section('content')
    <h1>Adicionar Novo Cliente</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <!-- Campo Nome -->
        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required><br>
        @error('name')
            <span class="error">{{ $message }}</span><br>
        @enderror
        <br>

        <!-- Campo Email -->
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required><br>
        @error('email')
            <span class="error">{{ $message }}</span><br>
        @enderror
        <br>

        <!-- Campo Telefone -->
        <label for="phone">Telefone:</label><br>
        <input 
            type="text" 
            name="phone" 
            id="phone" 
            value="{{ old('phone') }}" 
            pattern="[0-9]+" 
            maxlength="15" 
            placeholder="Apenas números"
        ><br>
        @error('phone')
            <span class="error">{{ $message }}</span><br>
        @enderror
        <br>

        <button type="submit" class="action-button save">Salvar</button>
    </form>

    <br>
    <a href="{{ route('customers.index') }}" class="action-button">Voltar à Lista</a>
@endsection
