@extends('layouts.app')
@section('title', 'Visualizar imagem')
@section('content')
        <div class="content">
            <div class="container">
                <div class="image-container">
                    <img src="{{ $image->image_path }}" alt="Visualizar imagem">
                </div>
                <div class="image-info">
                    <div class="info-header">
                        <div class="views">{{ $likes }} curtidas</div>
                        
                        <form method="POST" id="curtida" style="display: none;" action="/like">
                            @csrf
                            @if ($curtiu == 'Descurtir') 
                            <input name="acao" value="descurtir"> 
                            @else
                            <input name="acao" value="curtir">
                            @endif
                            <input name="usuario" value="{{ Auth::user()->username }}"> 
                            <input name="id_image" value="{{ $image->id }}">
                        </form>
                        <button type="submit" form="curtida" class="like-button"><i class="far fa-heart"></i> {{ $curtiu }}</button>

                    </div>
                    <div class="user">
                        <div class="profile-picture">
                            <img src="http://www.venmond.com/demo/vendroid/img/avatar/big.jpg" alt="">
                        </div>
                        @if (Auth::user()->username == $image->username)
                        <a href="/my-account"><div class="username">{{$image->username}}</div></a>
                        @else
                        <a href="/account/{{ $image->username }}"><div class="username">{{$image->username}}</div></a>
                        @endif
                    </div>
                    <p class="description">
                        {{ $image->description }} 
                    </p>
                </div>
            </div>
        </div>
@endsection