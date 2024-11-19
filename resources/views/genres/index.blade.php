@extends('layouts.app')

@section('title', 'Gêneros')

@section('content')
    <h1>Lista de Gêneros</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="action-button-add">
    <a href="{{ route('genres.create') }}" class="action-button">Adicionar Novo Gênero</a>
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
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                    <a href="{{ route('genres.show', $genre->id) }}" class="action-button view">Ver</a>
                    <a href="{{ route('genres.edit', $genre->id) }}" class="action-button edit">Editar</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="delete-button" style="display: inline;">
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
