<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function show($id) {
        $image = Image::where('id', $id)->firstOrFail();
        return view('image', ['image' => $image]); 
    }
}
