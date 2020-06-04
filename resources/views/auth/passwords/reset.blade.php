@extends('layouts.app')
@section('title', 'Resetar senha')
@section('content')
    <div class="content bg">
        <div class="container center">
            <div class="form-container">
                <h2 class="form-title">Resetar senha</h2>
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                        
                    <input type="hidden" name="token" value="{{ $token ?? '' }}">
    
                    <div class="row">
                        <label for="email">Email</label>
                        @error('email')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" autocomplete="email">
    
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
    
                    <button type="submit">Resetar senha</button>
                </form>
            </div>
        </div>
    </div>
@endsection