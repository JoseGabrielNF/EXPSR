<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;
use App\Followers;
use Auth;

class ProfileController extends Controller
{
    /* controlador do perfil do usuário */
    public function index() {

        $user = Auth::user();
        $albums = Album::where('user_id', $user->id)->take(4)->get();

        return view('profile', ['user' => $user, 'albums' => $albums, 'personal' => true]);
    }

    /* controlador do perfil de um usuário específico */
    public function show($username) {

        /* redireciona o usuário para /my-account caso ele tente acessar seu perfil através do nome de usuário */
        if (Auth::check() && $username == Auth::user()->username) {
            return redirect('my-account');
        }

        $user = User::where('username', $username)->firstOrFail();
        $albums = Album::where('user_id', $user->id)->take(4)->get();
        $follower = Followers::where('user_id', $user->id)->where('follower', Auth::user()->id)->first();

        if ($follower == null){
            $follower = false;
        } else {
            $follower = true;
        }

        return view('profile', ['user' => $user, 'albums' => $albums, 'personal' => false, 'follower' => $follower]);
    }

    public function follower () {
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

}
