@extends('layouts.app')
@section('title', $personal ? 'Meu perfil' : 'Perfil de ' . $user->name)
@section('content')
        <div class="content">
            <div class="container">
                <div class="profile-cover" style="background-image: url('{{ $user->profile_banner_path }}');">
                @if($personal)

                    <button onclick="toggleModal()"><i class="fas fa-camera"></i></button>
                @endif

                </div>
                <div class="profile-info">
                    <div class="profile-picture">
                        <div>
                            <img src="{{ $user->profile_picture_path }}" alt="{{ $user->username }}">
                            @if($personal)

                            <button onclick="toggleModal()"><i class="fas fa-camera"></i></button>
                            @endif

                        </div>
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
                        <button type="submit" form="add" class="follow align-right"><i class="fas fa-user-plus"></i> Seguir</button>
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
                    <a class="align-right" href="{{ $personal ? '/albums' : '/account/' . $user->username . '/albums' }}">Ver todos</a>
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
                    <a class="align-right" href="{{ $personal ? route('followers.index_followers') : route('followers.show_followers', $user->username) }}">Ver todos</a>
                </div>
                @if(count($seguidores) > 0)
                
                <div class="users">
                @foreach($seguidores as $seguidor)
                    <a class="user" href="{{ Auth::check() && Auth::user()->id == $seguidor->id ? route('account.index') : route('account.show', $seguidor->username) }}">
                        <div class="user-content">
                            <div class="cover" style="background-image: url('{{ $seguidor->profile_banner_path }}')"></div>
                            <div class="info">
                                <div class="profile-picture">
                                    <img src="{{ $seguidor->profile_picture_path }}" alt="{{ $seguidor->name }}">
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

                <div class="profile-section">
                    <h2 class="section-title">Seguindo</h2>
                    <a class="align-right" href="{{ $personal ? route('followers.index_following') : route('followers.show_following', $user->username) }}">Ver todos</a>
                </div>
                @if(count($seguindo) > 0)
                
                <div class="users">
                @foreach($seguindo as $seguido)

                    <a class="user" href="{{ Auth::check() && Auth::user()->id == $seguido->id ? route('account.index') : route('account.show', $seguido->username) }}">
                        <div class="user-content">
                            <div class="cover" style="background-image: url('{{ $seguido->profile_banner_path }}')"></div>
                            <div class="info">
                                <div class="profile-picture">
                                    <img src="{{ $seguido->profile_picture_path }}" alt="{{ $seguido->name }}">
                                </div>
                                <h3 class="user-name">{{ $seguido->name }}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach    

                </div>
                @else

                <div class="no-results">
                    <div><h4 class="title">{{ $personal ? 'Você não segue ninguém!' : 'Essa conta não segue ninguém!' }}</h4></div>
                </div>
                @endif

            </div>
            <div class="modal-background" id="modal-background">
                <div class="form-container">
                    <h2 class="form-title">Alterar imagem de Perfil/Capa</h2>
                    <form action="/edit-profile-images" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <label for="image">Selecione a imagem</label>
                            @error('image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="file" name="image">

                        <div class="row">
                            <label for="local">Foto de Perfil ou de Capa</label>
                            @error('local')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <select name="local">
                            <option value="profile">Perfil</option>
                            <option value="banner">Capa</option>
                        </select>
                        
                        <button type="submit">Adicionar</button>
                    </form>
                    <button class="close-modal" onclick="toggleModal()"><i class="fas fa-times"></i></button>
                </div>
            </div>   
        </div>
        @if(count($errors) > 0)
        <script>
            window.onload = function() { toggleModal() };
        </script>
        @endif
@endsection
