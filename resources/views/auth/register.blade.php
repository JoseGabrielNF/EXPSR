@extends('layouts.app')
@section('title', 'Criar conta')
@section('content')
        <div class="container">
            <div class="header">
                <h2 class="page-title">Criar conta</h2>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf    
                
                <div class="input-header">
                    <label for="name">Nome</label>
                    @error('name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <input class="@error('name') error @enderror" type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                
                <div class="input-header">
                    <label for="username">Nome de usuário</label>
                    @error('username')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <input class="@error('name') error @enderror" type="text" id="username" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                
                <div class="input-header">
                    <label for="email">Email</label>
                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <input class="@error('email') error @enderror" type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email">
                
                <div class="input-header">
                    <label for="password">Senha</label>
                    @error('password')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <input class="@error('password') error @enderror" type="text" id="password" name="password" autocomplete="new-password">
                
                <div class="input-header">
                    <label for="password-confirm">Confirme a senha</label>
                </div>
                <input type="text" id="password-confirm" name="password_confirmation" autocomplete="new-password">
                
                <button type="submit">Criar conta</button>
            </form>
        </div>
@endsection

@section('a')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Nome de usuário</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection