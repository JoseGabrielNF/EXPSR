@extends('layouts.app')
@section('title', 'Explorar')
@section('content')


<div class="albums">

@foreach($albums as $album)

    <div class="album" style="background-image: url('');">
        <div class="album-header">
            <h3 class="name">{{ $album->name }}</h3>
        </div>
    </div>
@endforeach

</div>

@endsection