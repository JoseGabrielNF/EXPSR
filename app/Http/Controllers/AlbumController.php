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
        $album = Album::where('id', $id)->firstOrFail();
        $images = Image::where('album_id', $album->id)->get();
        return view('albums.show', ['album' => $album, 'images' => $images]);
    }

    public function create_album() {
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

    public function add_image(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $id_user = Auth::user()->id;
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $image = new Image;

        $image->user_id = $id_user;
        $image->album_id = request('album_id');
        $image->image_path = '/images/'.$imageName;
        $image->description = "".request('description');

        $image->save();

        return back();
    }  
}