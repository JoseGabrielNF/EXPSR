@extends('layouts.app')
@section('title', 'Explorar')
@section('content')
        <div class="content">
            <div class="container">
                <div class="header">
                    <h2 class="page-title">Explorar</h2>
                </div>
                <div class="images">
                    @if(count($images) > 0)

                    @foreach($images as $image)
                    <a class="image" href="{{'/image/'.$image->id}}"  style="background-image: url('{{ $image->image_path }}');"></a>
                    @endforeach

                    @else

                    <div class="error-message"><i class="fas fa-exclamation-circle"></i>Não há imagens a serem mostradas!</div>

                    @endif
            </div>
        </div>
@endsection