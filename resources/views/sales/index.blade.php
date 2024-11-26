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

    <!-- Filtros -->
    <form action="{{ route('sales.index') }}" method="GET" style="margin: 20px auto; text-align: center; max-width: 600px; padding: 20px; background-color: #FFF5F5; border: 1px solid #FFB6C1; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div style="margin-bottom: 15px;">
            <label for="customer_id">Cliente:</label>
            <select name="customer_id" id="customer_id" style="padding: 8px; width: 100%; border-radius: 4px; border: 1px solid #ddd; margin-top: 5px;">
                <option value="">Todos</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="start_date">De:</label>
            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" 
                   style="padding: 8px; width: 48%; border-radius: 4px; border: 1px solid #ddd; margin-right: 4%;">
            <label for="end_date">Até:</label>
            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" 
                   style="padding: 8px; width: 48%; border-radius: 4px; border: 1px solid #ddd;">
        </div>

        <button type="submit" class="action-button" style="padding: 8px 15px; margin-top: 10px;">Filtrar</button>
    </form>

    <!-- Tabela de Vendas -->
    <table border="1" style="width: 50%; margin: 20px auto;">
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
            @forelse($sales as $sale)
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
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhuma venda encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
