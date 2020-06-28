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
                    @if(Auth::check() && !$personal)
                        @if(!$follower)

                        <form method="POST" id="add" style="display: none;" action="/follow">
                            @csrf
                            <input name="acao" value="seguir"> 
                            <input name="usuario" value="{{ $user->username }}"> 
                        </form>
                        <button type="submit" form="add" class="align-right"><i class="fas fa-user-plus"></i> Seguir</button>
                        @endif
                        @if($follower)

                        <form method="POST" id="remove" style="display: none;" action="/follow">
                            @csrf
                            <input name="acao" value="deseguir"> 
                            <input name="usuario" value="{{ $user->username }}"> 
                        </form>
                        <button type="submit" form="remove" class="align-right"><i class="fas fa-user-times"></i> Deixar de seguir</button>
                        @endif
                    @endif

                </div>

                <div class="profile-section">
                    <h2 class="section-title">Álbuns populares</h2>
                    <a class="align-right" href="/albums">Ver todos</a>
                </div>
                @if(count($albums) > 0)

                <div class="albums">
                @foreach($albums as $album)
                @php
                    $capa = App\Image::select('image_path')->where('album_id', $album->id)->first();
                @endphp
                @if ($capa == null)
                    @if ($personal)
                    <a class="album" href="album/{{$album->id}}" style="background-image: url('');">
                    @else
                    <a class="album" href="{{$user->username}}/album/{{$album->id}}" style="background-image: url('');">
                    @endif
                @else
                    @if ($personal)
                    <a class="album" href="album/{{$album->id}}" style="background-image: url('{{ $capa->image_path }}');">    
                    @else
                    <a class="album" href="{{$user->username}}/album/{{$album->id}}" style="background-image: url('{{ $capa->image_path }}');">
                    @endif
                @endif
                        <div class="album-header">
                            <h3 class="name">{{ $album->name }}</h3>
                        </div>
                    </a>
                @endforeach

                </div> 
                @else

                    <div class="no-results">
                        <div><h4 class="title">{{ $personal ? 'Você não possui álbuns!' : 'Não há álbuns a serem exibidos!' }}</h4></div>
                    </div>
                @endif

                <div class="profile-section">
                    <h2 class="section-title">Seguidores</h2>
                    <a class="align-right" href="#">Ver todos</a>
                </div>
                @if(count($seguidores) > 0)
                
                <div class="users">
                @foreach($seguidores as $seguidor)

                @if (Auth::user()->id == $seguidor->id)
                    <a class="user" href="/my-account">
                    @else
                    <a class="user" href="/account/{{ $seguidor->username }}"> 
                    @endif
                        <div class="user-content">
                            <div class="cover" style="background-image: url('/img/background.jpg')"></div>
                            <div class="info">
                                <div class="profile-picture">
                                    <img src="http://www.venmond.com/demo/vendroid/img/avatar/big.jpg" alt="{{ $seguidor->name }}">
                                </div>
                                <h3 class="user-name">{{ $seguidor->name }}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach    

                </div>
                @else

                    <div class="no-results">
                        <div><h4 class="title">{{ $personal ? 'Você não possui seguidores!' : 'Essa conta não possui seguidores!' }}</h4></div>
                    </div>
                @endif

            </div>
        </div>
@endsection