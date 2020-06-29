<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Likes;
use App\User;
use Auth;

class ImageController extends Controller
{
    public function show($id) {
        /*$image = Image::select('users.name', 'users.username', 'images.id', 'images.image_path', 'images.description')
                    ->join('albums', 'albums.id', '=', 'images.album_id')
                    ->join('users', 'users.id', '=', 'albums.user_id')
                    ->where('images.id', $id)->firstOrFail();
        
        $like_user = Likes::where('image_id', $image->id)->where('user_id', Auth::user()->id)->first();

        $likes = Likes::where('image_id', $image->id)->count();

        $by_user = User::where('username', $image->username)->firstOrFail();

        if ($like_user == "") {
            $curtiu = 'Curtir';
        } else {
            $curtiu = 'Descurtir';
        }

        return view('image', ['by_user' => $by_user, 'image' => $image, 'curtiu' => $curtiu, 'likes' => $likes]);*/

        $image = new Image;
        
        $parametros = $image->prepare($id, Auth::user()->id);
  
        return view('image', ['by_user' => $parametros['by_user'], 'image' => $parametros['image'], 'curtiu' => $parametros['curtiu'], 'likes' => $parametros['likes']]);

    }

    public function curtida () {
        $username = request('usuario');
        $acao = request('acao');
        $imagem = request('id_image');

        if ($acao == 'curtir') {
            Image::like($username, $imagem);
        }

        if ($acao == 'descurtir') {
            Image::dislike($username, $imagem);
        }

        /*$user = User::select('id')->where('username', $username)->firstOrFail();

        $likes = new Likes;

        $likes->image_id = $imagem;
        $likes->user_id = $user->id;

        if ($acao == 'curtir') {
            $likes->save();
        }

        if ($acao == 'descurtir') {
            Likes::where('image_id', $imagem)->where('user_id', $user->id)->delete();
        }*/

        return redirect('/image/' .$imagem);        
    }

    public function delete() {
        $id = request('image_id');
        $image = Image::deletar($id);
        
        return redirect('/album/'.$image->album_id);
    } 
    public function passar()
    {
       
        $id = request('image_id');
        $album = Image::select('album_id')->where('id', $id)->first();
        $image = Image::all();
        $images=$image;

        $i=0;
        $indice=$id;
        for ($i=0;$i<count($images);$i++) 
        {  
            if($images[$i]->id==$id)
            {
                if($i+1<count($images)){
                $indice=$images[$i+1]->id;
                break;
               }
            }   
        }
         return redirect('/image/'.$indice);

    }
    public function voltar()
    {
       
        $id = request('image_id');
        $album = Image::select('album_id')->where('id', $id)->first();
        $image = Image::all();
        $images=$image;

        $i=0;
        $indice=$id;
        for ($i=count($images)-1;$i>0;$i--) 
        {  
            if($images[$i]->id==$id)
            {
                $indice=$images[$i-1]->id;
                break;
            }   
        }
         return redirect('/image/'.$indice);

    }
}
