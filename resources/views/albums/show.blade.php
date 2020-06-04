@extends('layouts.app')
@php
    $images = [
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg'],
        ['url' => 'https://i.ytimg.com/vi/rklY-mJj9dc/maxresdefault.jpg']
    ];

    $album = [
        'name' => 'Paisagens',
        'images' => $images
    ];

@endphp
@section('title', $album['name'])
@section('content')
        <div class="content">
            <div class="container">
                <div class="header">
                    <h2 class="page-title">{{ $album['name'] }}</h2>
                    <span class="visibility public">Público</span>
                    <button class="align-right"><i class="far fa-image"></i> Adicionar</button>
                </div>
            @if(count($images) > 0)
                <div class="images">
            @foreach($images as $image)
                    <div class="image" style="background-image: url({{ $image['url'] }});"></div>
            @endforeach
                </div>
                <div class="footer">
                    <ul class="pagination">
                        <li><a href="#">Anterior</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Próxima</a></li>
                    </ul>
                </div>
            @else
                <div class="error-message"><i class="fas fa-search"></i>Esse álbum não possui nenhuma imagem!</div>
            @endif
            </div>
        </div>
@endsection