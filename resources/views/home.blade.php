@extends('layouts.app')

@section('title', 'SCREAM! discos')

@section('content')
    <div class="show-container">
        <!-- Mensagem de Boas-Vindas -->
        <h1>Bem-vindo à SCREAM!, sua loja favorita de discos.</h1>
        <p>Explore nossa coleção de discos incríveis!</p>
        <p>Na SCREAM!, acreditamos que a música é muito mais do que sons; ela é emoção, história e conexão. Cada disco conta uma narrativa, cada melodia ressoa com um momento único na vida de quem a ouve. Nosso propósito é propagar a cultura musical, oferecendo um espaço onde paixões são despertadas e memórias são criadas.</p>

        <p>SCREAM! discos – porque música é mais do que ouvir, é sentir. 🎶❤️</p>
    </div>

    <!-- Seção de Discos em Destaque -->
    <div class="featured-discs-container">
        <h2>Discos em Destaque</h2>
        <div class="disc-grid">
            @foreach($discs as $disc)
                <div class="disc-card">
                    @if($disc->cover_image)
                        <img src="{{ asset('storage/' . $disc->cover_image) }}" alt="{{ $disc->title }}" class="disc-image">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Capa do Disco" class="disc-image">
                    @endif
                    <h3>{{ $disc->title }}</h3>
                    <p>R$ {{ number_format($disc->price, 2, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
        <div class="action-button-add">
            <a href="{{ route('discs.index') }}" class="action-button">Ver Mais Discos</a>
        </div>
    </div>
@endsection
