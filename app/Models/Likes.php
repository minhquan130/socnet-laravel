<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Likes extends Model
{
    protected $fillable = [
        'like_id',
        'user_id',
        'post_id',
        'created_at',
        'updated_at'
    ];

    public function deleteLikeById($post_id) {
        $currentUserId = Session::get('user_id');
        return self::where('user_id', $currentUserId)->where('post_id', $post_id)->delete();
    }

    public function getCountLikeById($post_id) {
        return self::where('post_id', $post_id)->count();
    }
}
