<?php

namespace App;

use App\Image;
use App\Likes;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
        /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var int
     */
    protected $album_id;

    /**
     * @var string
     */
    protected $image_path;

    /**
     * @var string
     */
    protected $description;

    /*function __construct(int $user_id, int $album_id, string $image_path, string $description){
        $this->user_id = $user_id;
        $this->album_id = $album_id;
        $this->image_path = $image_path;
        $this->description = $description;
    }*/

    public function prepare($id, $user) {
        $image = Image::select('users.name', 'users.username', 'images.id', 'images.image_path', 'images.description')
                    ->join('albums', 'albums.id', '=', 'images.album_id')
                    ->join('users', 'users.id', '=', 'albums.user_id')
                    ->where('images.id', $id)->firstOrFail();

        $likes = Likes::where('image_id', $image['id'])->count();
        $like_user = Likes::where('image_id', $image['id'])->where('user_id', $user)->first();
        $by_user = User::where('username', $image->username)->firstOrFail();
        
        if ($like_user == "") {
            $curtiu = 'Curtir';
        } else {
            $curtiu = 'Descurtir';
        }
        
        $parametros = ['by_user' => $by_user, 'image' => $image, 'likes' => $likes, 'curtiu' => $curtiu];

        return $parametros;
    }

    public static function salvar($user_id, $album_id, $image_path, $description) {
        $this->user_id = $user_id;
        $this->album_id = $album_id;
        $this->image_path = $image_path;
        $this->description = $description;
        $this->save();
    }

    public static function deletar($id) {
        $album = Image::select('album_id')->where('id', $id)->first();
        $image = Image::where('id', $id)->delete();

        return $album;
    }

    public static function like($username, $imagem) {

        $user = User::select('id')->where('username', $username)->firstOrFail();

        $likes = new Likes;

        $likes->image_id = $imagem;
        $likes->user_id = $user->id;
        $likes->save();       

    }

    public static function dislike($username, $imagem) {
        $user = User::select('id')->where('username', $username)->firstOrFail();
        Likes::where('image_id', $imagem)->where('user_id', $user->id)->delete();
    }
}
