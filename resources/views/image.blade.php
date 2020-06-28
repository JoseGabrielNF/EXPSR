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
                        <div class="views">105.578 visualizações</div>
                        <button class="like-button"><i class="far fa-heart"></i> Curtir</button>
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