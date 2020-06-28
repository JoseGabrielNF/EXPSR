<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Album;
use App\Image;
use Auth;

class AlbumController extends Controller
{
    public function index() {

        $user = Auth::user();
        $albums = Album::where('user_id', $user->id)->get(); 

        return view('albums.index', ['user' => $user, 'albums' => $albums, 'personal' => true]);
    }

    public function show($id) {

        $album = Album::where('id', $id)->firstOrFail();

        /* verifica se o álbum é privado e se quem quer acessar é o dono dele */
        if ($album->public == false && (Auth::check() == false || $album->user_id != Auth::user()->id)) {
            return abort(401);
        }

        $images = Image::where('album_id', $album->id)->get();
        return view('albums.show', ['album' => $album, 'images' => $images, 'personal' => true]);
    }

    public function create_album(Request $request) {

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:16'],
            'visibility' => ['required', 'in:public,private']
        ];

        $messages = [
            'required' => 'Esse campo é obrigatório!',
            'name.min' => 'Nome muito curto!',
            'name.max' => 'Nome muito longo!',
            'visibility.in' => 'Opção inválida!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/albums')->withErrors($validator)->withInput();
        }

        $id_user = Auth::user()->id;
        $name =  $request->input('name');

        if ($request->input('visibility') == 'public'){
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

        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['required', 'string', 'min:3', 'max:250']
        ];

        $messages = [
            'required' => 'Esse campo é obrigatório!',
            'image.mimes' => 'Tipo não permitido!',
            'image.max' => 'Imagem muito grande!',
            'description.min' => 'Descrição muito curta!',
            'description.max' => 'Descrição muito longa!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/album/' . $request->input('album_id'))->withErrors($validator)->withInput();
        }
        
        $id_user = Auth::user()->id;
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $image = new Image;

        $image->user_id = $id_user;
        $image->album_id = $request->input('album_id');
        $image->image_path = '/images/'.$imageName;
        $image->description = "".request('description');

        $image->save();

        return back();
    }  
}