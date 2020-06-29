@extends('layouts.app')
@section('title', $followers_view ? ($personal ? 'Meus seguidores' : 'Seguidores de ' . $user->name ) : ($personal ? 'Pessoas que sigo' : 'Pessoas seguidas por ' . $user->name))
@section('content')
        <div class="content">
            <div class="container">
                <div class="header">
                    <h2 class="page-title">{{ $followers_view ? ($personal ? 'Meus seguidores' : 'Seguidores de ' . $user->name ) : ($personal ? 'Pessoas que sigo' : 'Pessoas seguidas por ' . $user->name) }}</h2>
                </div>
                @if(count($accounts) > 0)

                <div class="users">
                @foreach($accounts as $account)
                    <a class="user" href="{{ Auth::check() && Auth::user()->id == $account->id ? route('account.index') : route('account.show', $account->username) }}">
                        <div class="user-content">
                            <div class="cover" style="background-image: url('{{ $account->profile_banner_path }}')"></div>
                            <div class="info">
                                <div class="profile-picture">
                                    <img src="{{ $account->profile_picture_path }}" alt="{{ $account->name }}">
                                </div>
                                <h3 class="user-name">{{ $account->name }}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach

                </div>
                @else

                <div class="error-message"><i class="fas fa-search"></i>{{ $followers_view ? ($personal ? 'Você não possui seguidores!' : 'Essa conta não possui seguidores!') : ($personal ? 'Você não segue ninguém!' : 'Essa conta não segue ninguém!' )}}</div>
                @endif
            
            </div>
        </div>
@endsection