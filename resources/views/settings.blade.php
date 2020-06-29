@extends('layouts.app')
@section('title', 'Configurações')
@section('content')
        <div class="content">
            <div class="container">
                <div class="header">
                    <h2 class="page-title">Configurações</h2>
                </div>

                <h3 class="setting-title">Alterar nome</h3>
                <form class="settings-form" action="" method="post">
                @csrf

                    <input type="text" id="name" name="name" value="{{ $user->name }}">
                    <button type="submit">Alterar</button>
                    
                    @error('name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </form>

                <h3 class="setting-title">Alterar nome de usuário</h3>
                <form class="settings-form" action="" method="post">
                @csrf

                    <input type="text" id="username" name="username" value="{{ $user->username }}">
                    <button type="submit">Alterar</button>

                    @error('username')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </form>

                <h3 class="setting-title">Alterar endereço de email</h3>
                <form class="settings-form" action="" method="post">
                @csrf

                    <input type="text" id="email" name="email" value="{{ $user->email }}">
                    <button type="submit">Alterar</button>

                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </form>

                <h3 class="setting-title">Alterar senha</h3>
                <form class="settings-form column" action="" method="post">
                @csrf

                    <label for="current-password">Senha atual</label>
                    <input type="password" id="current-password" name="current-password">
                    <label for="new-password">Nova senha</label>
                    <input type="password" id="new-password" name="new-password">
                    <label for="new-password">Confirmar nova senha</label>
                    <input type="password" id="new-password-confirm" name="new-password_confirmation">
                    <button type="submit">Alterar</button>

                    @error('password')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </form>

                <h3 class="setting-title">Excluir minha conta</h3>
                <form class="settings-form" action="" method="post">
                @csrf

                    <button type="submit">Excluir</button>
                </form>
            </div>
        </div>
@endsection