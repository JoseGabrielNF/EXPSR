<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($id) {

        return view('image', ['id' => $id]); 
    }
}
