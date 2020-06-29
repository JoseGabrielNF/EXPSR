@extends('layouts.app')
@section('title', 'Configurações')
@section('content')
        <div class="content">
            <div class="container">
                <div class="header">
                    <h2 class="page-title">Configurações</h2>
                </div>

                <h3 class="setting-title">Alterar nome</h3>
                <form class="settings-form" action="edit-name" method="post">
                @csrf

                    <input type="text" id="name" name="name" value="{{ $user->name }}">
                    <button type="submit">Alterar</button>
                    
                    @error('name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </form>

                <h3 class="setting-title">Alterar nome de usuário</h3>
                <form class="settings-form" action="edit-username" method="post">
                @csrf

                    <input type="text" id="username" name="username" value="{{ $user->username }}">
                    <button type="submit">Alterar</button>

                    @error('username')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </form>

                <h3 class="setting-title">Excluir minha conta</h3>
                <form class="settings-form" action="delete-profile" method="post">
                @csrf

                    <button type="submit">Excluir</button>
                </form>
            </div>
        </div>
@endsection
