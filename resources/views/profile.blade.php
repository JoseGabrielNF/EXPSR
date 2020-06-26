@extends('layouts.app')
@section('title', $personal ? 'Meu perfil' : 'Perfil de ' . $user->name)
@section('content')
        <div class="content">
            <div class="container">
                <div class="profile-cover">
                </div>
                <div class="profile-info">
                    <div class="profile-picture">
                        <!--<img src="#" alt="{{ $user->name }}">-->
                    </div>
                    <div class="info">
                        <h1 class="user-name">{{ $user->name }}</h1>
                        <div class="user-description">
                            Seja bem-vindo ao meu perfil!
                        </div>
                    </div>
                    @if(!$personal)

                    <button class="align-right"><i class="fas fa-user-plus"></i> Adicionar</button>
                    @endif

                </div>

                <div class="profile-section">
                    <h2 class="section-title">Álbuns populares</h2>
                    <a class="align-right" href="#">Ver todos</a>
                </div>

                @if(count($albums) > 0)

                <div class="albums">

                @foreach($albums as $album)

                    <div class="album" style="background-image: url('');">
                        <div class="album-header">
                            <h3 class="name">{{ $album->name }}</h3>
                        </div>
                    </div>
                
                @endforeach

                </div>
                @endif

                <div class="profile-section">
                    <h2 class="section-title">Amigos</h2>
                    <a class="align-right" href="#">Ver todos</a>
                </div>
            </div>
        </div>
@endsection