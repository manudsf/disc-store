@extends('layouts.app')

@section('title', 'Discos')

@section('content')
    <h1>Lista de Discos</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Formulário de Pesquisa -->
    <div class="search-container">
    <form action="{{ route('discs.search') }}" method="GET" class="search-form">
        <input 
            type="text" 
            name="query" 
            placeholder="Pesquisar" 
            value="{{ request('query') }}" <!-- Mantém o valor pesquisado -->
        >
        <button type="submit" class="action-button">Pesquisar</button>
    </form>
</div>


    <!-- Botão Adicionar Novo Disco -->
    <div class="action-button-add">
        <a href="{{ route('discs.create') }}" class="action-button">Adicionar Novo Disco</a>
    </div>

    <!-- Verifica se há resultados -->
    @if($discs->isEmpty())
        <p style="text-align: center; color: red;">Nenhum disco encontrado.</p>
    @else
        <!-- Tabela de Discos -->
        <table border="1" style="width: 80%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Preço</th>
                    <th>Gênero</th>
                    <th>Artista</th>
                    <th>Formato</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discs as $disc)
                    <tr>
                        <td>{{ $disc->id }}</td>
                        <td>{{ $disc->title }}</td>
                        <td>R$ {{ number_format($disc->price, 2, ',', '.') }}</td>
                        <td>{{ $disc->genre->name }}</td>
                        <td>{{ $disc->artist->name }}</td>
                        <td>{{ $disc->format->name }}</td>
                        <td>
                            <a href="{{ route('discs.show', $disc->id) }}" class="action-button view">Ver</a>
                            <a href="{{ route('discs.edit', $disc->id) }}" class="action-button edit">Editar</a>
                            <form action="{{ route('discs.destroy', $disc->id) }}" method="POST" class="delete-button" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button delete" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
