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
                        @if (Auth::check() && Auth::user()->username == $image->username)
                        <form method="POST" id="delete" style="display: none;" action="/delete_image">
                            @csrf
                            <input name="image_id" value="{{ $image->id }}">
                        </form>
                        <button type="submit" form="delete" ><i class="far fa-trash-alt"></i> Apagar imagem</button>
                        
                        <form method="POST" id="voltar" style="display: none;" action="/volta_foto">
                            @csrf
                            <input name="image_id" value="{{ $image->id }}">
                            <input name="image" value="{{ $image }}">
                        </form>
                        <button type="submit" form="voltar" ><i class="button"></i> voltar</button>
                        
                        <form method="POST" id="passar" style="display: none;" action="/passa_foto">
                            @csrf
                            <input name="image_id" value="{{ $image->id }}">
                            <input name="image" value="{{ $image }}">
                        </form>
                        
                        <button type="submit" form="passar" ><i class="button"></i> passar</button>
                        
                        @endif
                        @if(Auth::check())
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
                        <button type="submit" form="curtida"><i class="far fa-heart"></i> {{ $curtiu }}</button>
                        @endif

                    </div>
                    <div class="user">
                        <div class="profile-picture">                            
                            <img src="{{ $by_user->profile_picture_path }}" alt="">
                        </div>
                        @if (Auth::check() && Auth::user()->username == $image->username)
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
