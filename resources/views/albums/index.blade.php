@extends('layouts.app')
@section('title', $personal ? 'Meus álbuns' : 'Álbuns de ' . $user->username )
@section('content')
        <div class="content">
            <div class="container">
                <div class="header">
                    <h2 class="page-title">{{ $personal ? 'Meus álbuns' : 'Álbuns de ' . $user->username }}</h2>
                    @if($personal)

                    <button class="align-right" onclick="toggleModal()"><i class="far fa-images"></i> Criar</button>
                    @endif
                </div>
                
                @if(count($albums) > 0)

                <div class="albums">

                @foreach($albums as $album)
                @php
                    $capa = App\Image::select('image_path')->where('album_id', $album->id)->first();
                @endphp

                    @if ($capa == null)
                    <a class="album" href="album/<?= $album->id?>" style="background-image: url('');">
                    @else
                    <a class="album" href="album/<?= $album->id?>" style="background-image: url('{{ $capa->image_path }}');">
                    @endif
                        <div class="album-header">
                            <h3 class="name">{{ $album->name }}</h3>
                        </div>
                    </a>
                
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

                <div class="error-message"><i class="fas fa-exclamation-circle"></i>{{ $personal ? 'Você não possui nenhum álbum!' : 'Não há álbuns a serem mostrados!' }}</div>
                
                @endif

            </div>
            <div class="modal-background" id="modal-background">
                <div class="form-container">
                    <h2 class="form-title">Criar álbum</h2>
                    <form action="/create-album" method="post">
                        @csrf

                        <div class="row">
                            <label for="name">Nome do álbum</label>
                            @error('name')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="text" name="name">

                        <div class="row">
                            <label for="visibility">Visibilidade</label>
                            @error('visibility')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <select name="visibility">
                            <option value="public">Público</option>
                            <option value="private">Privado</option>
                        </select>

                        <button type="submit">Criar</button>
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
