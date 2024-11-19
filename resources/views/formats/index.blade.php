@extends('layouts.app')

@section('title', 'Formatos')

@section('content')
    <h1>Lista de Formatos</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <div class="action-button-add">
    <a href="{{ route('formats.create') }}" class="action-button">Adicionar Novo Formato</a>
</div>

    <table border="1" style="width: 50%; margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formats as $format)
                <tr>
                    <td>{{ $format->id }}</td>
                    <td>{{ $format->name }}</td>
                    <td>
                    <a href="{{ route('formats.show', $format->id) }}" class="action-button view">Ver</a>
                    <a href="{{ route('formats.edit', $format->id) }}" class="action-button edit">Editar</a>
                        <form action="{{ route('formats.destroy', $format->id) }}" method="POST" class="delete-button" style="display: inline;">
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
