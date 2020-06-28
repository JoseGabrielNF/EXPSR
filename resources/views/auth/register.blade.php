@extends('layouts.app')
@section('title', 'Criar conta')
@section('content')
    <div class="content bg">
        <div class="container center">
            <div class="form-container">
                <h2 class="form-title">Criar conta</h2>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    
                    <div class="row">
                        <label for="name">Nome</label>
                        @error('name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="name">
                    
                    <div class="row">
                        <label for="username">Nome de usuário</label>
                        @error('username')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" autocomplete="username">
                    
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
                    <input type="password" id="password" name="password" autocomplete="new-password">
                    
                    <div class="row">
                        <label for="password-confirm">Confirme a senha</label>
                    </div>
                    <input type="password" id="password-confirm" name="password_confirmation" autocomplete="new-password">
                    
                    <button type="submit">Criar conta</button>
                    <span class="terms">Ao criar uma conta você concorda com nossos <a href="/terms.php">termos e condições</a>.</span>
                </form>
            </div>
        </div>
    </div>
@endsection