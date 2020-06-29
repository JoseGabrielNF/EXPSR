<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Album;
use App\Image;
use App\Followers;
use Auth; 

class ProfileController extends Controller 
{
    /* controlador do perfil do usuário */
    public function index() {

        $user = Auth::user();
        $albums = Album::where('user_id', $user->id)->take(4)->get();
        $seguidores = Followers::join('users', 'users.id', '=', 'followers.follower')->where('user_id', $user->id)->take(4)->get();
        $seguindo = Followers::join('users', 'users.id', '=', 'followers.user_id')->where('follower', $user->id)->take(4)->get();

        return view('profile', ['user' => $user, 'albums' => $albums, 'personal' => true, 'seguidores' => $seguidores, 'seguindo' => $seguindo]);
    }

    /* controlador do perfil de um usuário específico */
    public function show($username) {

        /* redireciona o usuário para /my-account caso ele tente acessar seu perfil através do nome de usuário */
        if (Auth::check() && $username == Auth::user()->username) {
            return redirect('my-account');
        }

        $user = User::where('username', $username)->firstOrFail();
        $albums = Album::where('user_id', $user->id)->where('public', 1)->take(4)->get();
        $seguidores = Followers::join('users', 'users.id', '=', 'followers.follower')->where('user_id', $user->id)->take(4)->get();
        $seguindo = Followers::join('users', 'users.id', '=', 'followers.user_id')->where('follower', $user->id)->take(4)->get();
        $follower = Followers::where('user_id', $user->id)->where('follower', Auth::user()->id)->first();

        if ($follower == null){
            $follower = false;
        } else {
            $follower = true;
        }

        return view('profile', ['user' => $user, 'albums' => $albums, 'personal' => false, 'seguidores' => $seguidores, 'seguindo' => $seguindo, 'follower' => $follower]);
    }

    public function settings() {
        $user = Auth::user();
        return view('settings', ['user' => $user]);
    }

    public function album_perfil($username, $album_id) {
        $album = Album::where('id', $album_id)->firstOrFail();
        $images = Image::where('album_id', $album->id)->get();
        return view('albums.show', ['album' => $album, 'images' => $images, 'personal' => false]);
    }

    public function list_albums($username) {

        /* redireciona o usuário para /albums caso ele tente acessar seus albuns através do nome de usuário */
        if (Auth::check() && $username == Auth::user()->username) {
            return redirect('/albums');
        }

        $user = User::where('username', $username)->firstOrFail();
        $albums = Album::where('user_id', $user->id)->where('public', 1)->get();

        return view('albums.index', ['user' => $user, 'albums' => $albums, 'personal' => false]);
    }

    public function follow () {
        $username = request('usuario');
        $follower = Auth::user()->id;

        $user = User::select('id')->where('username', $username)->firstOrFail();

        $followers = new Followers;

        $followers->user_id = $user->id;
        $followers->follower = $follower;

        if (request('acao') == 'seguir') {
            $followers->save();
        }

        if ((request('acao') == 'deseguir')) {
            Followers::where('user_id', $user->id)->where('follower', Auth::user()->id)->delete();
        }

        return redirect('/account/' . $username);
    }

    public function settings(){
        $user = Auth::user();
        return view('settings', ['user' => $user]);
    }
    
    public function edit_profile_images(Request $request){
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'local' => ['required', 'in:profile,banner']
        ];

        $messages = [
            'required' => 'Esse campo é obrigatório!',
            'image.mimes' => 'Tipo não permitido!',
            'image.max' => 'Imagem muito grande!',
            'local.in' => 'Opção inválida!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/my-account')->withErrors($validator)->withInput();
        }
        
        $id_user = Auth::user()->id;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        if ($request->input('local') == 'banner'){
            User::where('id', $id_user)
                ->update(['profile_banner_path' => '/images/'.$imageName]);
        } else {
            User::where('id', $id_user)
                ->update(['profile_picture_path' => '/images/'.$imageName]);
        }        

        return back();
    }

    public function edit_name(Request $request){
        $rules = [
            'name' => ['required', 'max:2048']
        ];
        
        $messages = [
            'required' => 'Esse campo é obrigatório!',
            'max' => 'Nome muito grande!'
        ];
              
        $id_user = Auth::user()->id;
        User::where('id', $id_user)->update(['name' => $request->name]);

        return back();
    }
    
    public function edit_username(Request $request) {
        $rules = [
            'username' => ['required', 'string', 'min:3', 'max:16', 'unique:users']
        ];

        $messages = [
            'required' => 'Esse campo é obrigatório!',
            'min' => 'Nome muito curto!',
            'max' => 'Nome muito grande!',
            'unique' => 'Nome de usuário em uso!'
            'name.max' => 'Nome muito grande!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('account.settings')->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        User::where('id', $user->id)->update(['username' => $request->input('username')]);

        return back();
    }
    
    public function delete_profile(){
        $id_user = Auth::user()->id;
        User::where('id', $id_user)->delete();
        return redirect('/');
    }
}
