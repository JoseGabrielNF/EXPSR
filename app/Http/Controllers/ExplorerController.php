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

    $images = Image::select('images.image_path','albums.public' )
    ->join('albums', 'albums.id', 'images.album_id')
    ->where('albums.public',1)->where('album_id','!=', $user->id)->get();
    

     return view('explorer', [ 'images'=>$images, 'personal' => true]);
    
    }
   
  
}
