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
        $image = Image::select('users.name', 'users.username', 'images.id', 'images.image_path', 'images.description')
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

        return view('image', ['by_user' => $by_user, 'image' => $image, 'curtiu' => $curtiu, 'likes' => $likes]); 
    }

    public function curtida () {
        $username = request('usuario');
        $acao = request('acao');
        $imagem = request('id_image');

        $user = User::select('id')->where('username', $username)->firstOrFail();

        $likes = new Likes;

        $likes->image_id = $imagem;
        $likes->user_id = $user->id;

        if ($acao == 'curtir') {
            $likes->save();
        }

        if ($acao == 'descurtir') {
            Likes::where('image_id', $imagem)->where('user_id', $user->id)->delete();
        }

        return redirect('/image/' .$imagem);        
    }

    public function delete() {
        $id = request('image_id');
        $album = Image::select('album_id')->where('id', $id)->first();
        $image = Image::where('id', $id)->delete();
        
        return redirect('/album/'.$album->album_id);
    } 
}
