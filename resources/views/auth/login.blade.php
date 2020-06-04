@extends('layouts.app')
@section('title', 'Entrar')
@section('content')
    <div class="content bg">
        <div class="container center">
            <div class="form-container">
                <h2 class="form-title">Entrar</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    
                    <div class="row">
                        <label for="email">Email</label>
                        @error('email')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email">
    
                    <div class="row">
                        <label for="password">Senha</label>
                        @error('password')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="password" id="password" name="password" autocomplete="current-password">
    
                    <div class="row">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Lembrar de mim</label>
                        @if (Route::has('password.request'))
                        <a class="align-right" href="{{ route('password.request') }}">Esqueci minha senha!</a>
                        @endif
                    </div>
    
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection