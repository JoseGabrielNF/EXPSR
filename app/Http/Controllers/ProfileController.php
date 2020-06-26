<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;
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

        return view('profile', ['user' => $user, 'albums' => $albums, 'personal' => false]);
    }
}
