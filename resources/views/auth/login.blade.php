@extends('layouts.app')

@section('title', 'Login - SCREAM! discos')

@section('content')
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="action-button save">Entrar</button>
            </div>

            <div class="form-group">
                <a href="{{ route('password.request') }}" class="forgot-link">Esqueceu sua senha?</a>
            </div>
        </form>

        <!-- Seção do Registro -->
        <div class="register-link">
            <p>Não tem uma conta? <a href="{{ route('register') }}" class="action-button register">Registrar-se</a></p>
        </div>
    </div>
@endsection
