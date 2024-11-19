@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <h1>Lista de Clientes</h1>

    <div class="action-button-add">
    <a href="{{ route('customers.create') }}" class="action-button">Cadastrar Novo Cliente</a>
</div>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" style="width: 50%; margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone ?? 'Não informado' }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="action-button view">Ver</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="action-button edit">Editar</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="delete-button" style="display: inline;">
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
