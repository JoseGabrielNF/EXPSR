@extends('layouts.app')
@section('title', 'Explorar')
@section('content')



<div class="albums">

<div class="content">
           <div class="images">
            @foreach($images as $image)
                     <a class="image" href="{{'/image/'.$image->id}}"  style="background-image: url('{{ $image->image_path }}');"></a>
            @endforeach
            </div>
            </div>

@endsection