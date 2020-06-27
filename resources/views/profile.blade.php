@extends('layouts.app')
@section('title', $personal ? 'Meu perfil' : 'Perfil de ' . $user->name)
@section('content')
        <div class="content">
            <div class="container">
                <div class="profile-cover"></div>
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

                    <a class="album" href="#" style="background-image: url('');">
                        <div class="album-header">
                            <h3 class="name">{{ $album->name }}</h3>
                        </div>
                    </a>
                
                @endforeach

                </div>
                @endif

                <div class="profile-section">
                    <h2 class="section-title">Seguidores</h2>
                    <a class="align-right" href="#">Ver todos</a>
                </div>
                
                <div class="followers">
                    <a class="follower" href="#">
                        <div class="cover" style="background-image: url('/img/background.jpg')"></div>
                        <div class="info">
                            <div class="profile-picture">
                                <img src="http://www.venmond.com/demo/vendroid/img/avatar/big.jpg" alt="{{ $user->name }}">
                            </div>
                            <h3 class="user-name">{{ $user->name }}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
@endsection