<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function show($id) {
        $image = Image::select('users.name', 'users.username', 'images.id', 'images.image_path', 'images.description')
                    ->join('albums', 'albums.id', '=', 'images.album_id')
                    ->join('users', 'users.id', '=', 'albums.user_id')
                    ->where('images.id', $id)->firstOrFail();
        return view('image', ['image' => $image]); 
    }
}
