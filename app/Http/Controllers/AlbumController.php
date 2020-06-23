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
        /* Terminar de implementar */
    }

    public function addImage() {
        /* Terminar de implementar */
    }   
}