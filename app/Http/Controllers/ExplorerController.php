<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;
use Auth;

class ExplorerController extends Controller
{
    
    public function index() {

    $user = Auth::user();

    $images = Image::select('users.name', 'users.username', 'images.id', 'images.image_path' )
    ->join('albums', 'albums.id', 'images.album_id')
    ->join('users', 'users.id', 'albums.user_id')
    ->where('albums.public',1)->where('album_id','!=', $user->id)->get();

     return view('explorer', [ 'images'=>$images, 'personal' => true]);
    
    }
   
  
}
