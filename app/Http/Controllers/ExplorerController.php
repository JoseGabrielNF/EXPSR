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
        
        $albums = Album::where('user_id', $user->id)->take(4)->get();

        return view('explorer', ['user' => $user, 'albums' => $albums, 'personal' => true]);
    
    }
}
