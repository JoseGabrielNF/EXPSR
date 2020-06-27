<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;
use Auth;

class AlbumController extends Controller
{
    public function index() {

        $albums = Album::where('user_id', Auth::user()->id)->get(); 

        return view('albums.index', ['albums' => $albums]);
    }

    public function show($id) {
        $album = Album::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $images = Image::where('id', $id)->get();
        return view('albums.show', ['album' => $album, 'images' => $images]);
    }

    public function createAlbum() {
        $id_user = Auth::user()->id;
        $name =  request('name');

        if (request('visibility') == 'public'){
            $visibilidade = 1;
        } else {
            $visibilidade = 0;
        }

        $album = new Album;

        $album->user_id = $id_user;
        $album->name = $name;
        $album->public = $visibilidade;

        $album->save();

        return redirect('/album/' . $album->id);

    }

    public function addImage() {
        /* Terminar de implementar */
    }   
}