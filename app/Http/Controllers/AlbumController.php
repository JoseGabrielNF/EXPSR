<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Auth;

class AlbumController extends Controller
{
    public function index() {

        $albums = Album::where('user_id', Auth::user()->username)->get(); 

        return view('albums.index', ['albums' => $albums]);
    }

    public function show($id) {

        return view('albums.show', ['id' => $id]);
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

    }

    public function addImage() {
        /* Terminar de implementar */
    }   
}