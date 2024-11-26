@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <h1>Editar Cliente</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required><br>
        @error('name')
            <span class="error">{{ $message }}</span><br>
        @enderror
        <br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required><br>
        @error('email')
            <span class="error">{{ $message }}</span><br>
        @enderror
        <br>

        <label for="phone">Telefone:</label><br>
        <input 
            type="text" 
            name="phone" 
            id="phone" 
            value="{{ old('phone', $customer->phone) }}" 
            pattern="[0-9]+" 
            maxlength="15" 
            placeholder="Apenas números"
        ><br>
        @error('phone')
            <span class="error">{{ $message }}</span><br>
        @enderror
        <br>

        <button type="submit" class="action-button save">Atualizar</button>
    </form>

    <br>
    <a href="{{ route('customers.index') }}" class="action-button">Voltar à Lista</a>
@endsection
