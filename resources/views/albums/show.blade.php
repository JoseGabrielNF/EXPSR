@extends('layouts.app')

@php
    //echo $album;
@endphp

@section('title', $album->name)
@section('content')
        <div class="content">
            <div class="container">
                <div class="header">
                    <h2 class="page-title">{{ $album->name }}</h2>
                    @if($album->public == 1)
                        <span class="visibility public">Público</span>
                    @else
                        <span class="visibility private">Privado</span>
                    @endif
                    <button class="align-right" onclick="toggleModal()"><i class="far fa-image"></i> Adicionar</button>
                </div>
            @if(count($images) > 0)
                <div class="images">
            @foreach($images as $image)
                    <a class="image" href="#" style="background-image: url('');"></a>
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
            <div class="modal-background" id="modal-background">
                <div class="form-container">
                    <h2 class="form-title">Adicionar imagem</h2>
                    <form action="/add-image" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <label for="image">Selecione a imagem</label>
                        </div>
                        <input type="file" name="image">
                        <input type="hidden" name="album_id" value="{{ $album->id }}">
                        
                        <div class="row">
                            <label for="description">Descrição da imagem</label>
                        </div>
                        <textarea name="description" maxlength="250"></textarea>

                        <button type="submit">Adicionar</button>
                    </form>
                    <button class="close-modal" onclick="toggleModal()"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
@endsection