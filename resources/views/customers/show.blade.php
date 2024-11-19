@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
    <div class="show-container">
        <h1>Detalhes do Cliente</h1>

        <div class="info-box">
            <p><strong>Nome:</strong> {{ $customer->name }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Telefone:</strong> {{ $customer->phone ?? 'Não informado' }}</p>
        </div>

        <div class="center-link">
            <a href="{{ route('customers.index') }}" class="action-button">Voltar à Lista</a>
        </div>
    </div>
@endsection
