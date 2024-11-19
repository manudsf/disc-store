@extends('layouts.app')

@section('title', 'Detalhes da Venda')

@section('content')
    <div class="show-container">
        <h1>Detalhes da Venda</h1>

        <div class="info-box">
            <p><strong>Cliente:</strong> {{ $sale->customer->name }}</p>
            <p><strong>Total (R$):</strong> {{ number_format($sale->total_price, 2, ',', '.') }}</p>
            <p><strong>Data:</strong> {{ $sale->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <h3>Itens da Venda:</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Disco</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário (R$)</th>
                    <th>Total (R$)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $item)
                    <tr>
                        <td>{{ $item->disc->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 2, ',', '.') }}</td>
                        <td>{{ number_format($item->price * $item->quantity, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="center-link">
            <a href="{{ route('sales.index') }}" class="action-button">Voltar à Lista</a>
        </div>
    </div>
@endsection
