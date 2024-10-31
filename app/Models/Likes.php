<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Likes extends Model
{
    protected $table = 'likes'; // Tên bảng
    protected $primaryKey = 'like_id'; // Khóa chính của bảng
    protected $fillable = [
        'user_id',
        'post_id',
        'created_at',
        'updated_at'
    ];

    public function checkLike($post_id)
    {
        $currentUserId = Session::get('user_id');
        $like = self::where('user_id', $currentUserId)->where('post_id', $post_id)->first();

        if (!$like) {
            $newLike = new self();
            $newLike->user_id = $currentUserId;
            $newLike->post_id = $post_id;
            $newLike->save();
            return 1;
        } else {
            // dd($like);
            $like->delete();
            return 0;
        }
    }

    public function isLiked($post_id)
    {
        $currentUserId = Session::get('user_id');
        return $like = self::where('user_id', $currentUserId)->where('post_id', $post_id)->first();
    }

    public function getCountLikeById($post_id)
    {
        return self::where('post_id', $post_id)->count();
    }
}
