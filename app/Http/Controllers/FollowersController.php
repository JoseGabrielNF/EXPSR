<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Followers;

class FollowersController extends Controller
{
    /* controlador para a página de seguidores do usuário conectado */
    public function index_followers() {

        $user = Auth::user();
        $accounts = Followers::join('users', 'users.id', '=', 'followers.follower')->where('user_id', $user->id)->get();

        return view('following', ['user' => $user, 'accounts' => $accounts, 'followers_view' => true, 'personal' => true]);
    }

    /* controlador para a página de pessoas que o usuário conectado segue */
    public function index_following() {

        $user = Auth::user();
        $accounts = Followers::join('users', 'users.id', '=', 'followers.user_id')->where('follower', $user->id)->get();

        return view('following', ['user' => $user, 'accounts' => $accounts, 'followers_view' => false, 'personal' => true]);
    }

    /* controlador para a página de seguidores de um usuário específico */
    public function show_followers($username) {

        /* redireciona o usuário para /followers caso ele tente acessar a página de seguidores através do nome de usuário */
        if (Auth::check() && $username == Auth::user()->username) {
            return redirect()->route('followers.index_followers');
        }
        
        $user = User::where('username', $username)->firstOrFail();
        $accounts = Followers::join('users', 'users.id', '=', 'followers.follower')->where('user_id', $user->id)->get();

        return view('following', ['user' => $user, 'accounts' => $accounts, 'followers_view' => true, 'personal' => false]);
    }

    /* controlador para a página de pessoas que um usuário específico segue */
    public function show_following($username) {

        /* redireciona o usuário para /following caso ele tente acessar a página de pessoas que segue através do nome de usuário */
        if (Auth::check() && $username == Auth::user()->username) {
            return redirect()->route('followers.index_following');
        }

        $user = User::where('username', $username)->firstOrFail();
        $accounts = Followers::join('users', 'users.id', '=', 'followers.user_id')->where('follower', $user->id)->get();

        return view('following', ['user' => $user, 'accounts' => $accounts, 'followers_view' => false, 'personal' => false]);
    }
}