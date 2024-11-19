@extends('layouts.app')

@section('title', 'Artistas')

@section('content')
    <h1>Lista de Artistas</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <div class="action-button-add">
    <a href="{{ route('artists.create') }}"  class="action-button" >Adicionar Novo Artista</a>
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
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->id }}</td>
                    <td>{{ $artist->name }}</td>
                    <td>
                    <a href="{{ route('artists.show', $artist->id) }}" class="action-button view">Ver</a>
<a href="{{ route('artists.edit', $artist->id) }}" class="action-button edit">Editar</a>
<form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="delete-button" style="display: inline;">
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
