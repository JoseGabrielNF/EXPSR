@extends('layouts.app')
@section('title', 'Visualizar imagem')
@section('content')
        <div class="content">
            <div class="container">
                <div class="image-container">
                    <img src="/img/background.jpg" alt="Visualizar imagem">
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
                        <a href="#"><div class="username">username</div></a>
                    </div>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in consequat risus, id volutpat quam.
                    </p>
                </div>
            </div>
        </div>
@endsection