@extends('layouts.app')

@section('title', 'Lista de Vendas')

@section('content')
    <h1>Lista de Vendas</h1>

    <div class="action-button-add">
    <a href="{{ route('sales.create') }}" class="action-button">Começar Nova Venda</a>
</div>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" style="width: 50%; margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Total (R$)</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->customer->name }}</td>
                    <td>{{ number_format($sale->total_price, 2, ',', '.') }}</td>
                    <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="action-button view">Ver</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="delete-button" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="action-button delete" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
