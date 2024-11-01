<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Comments extends Model
{
    protected $table = 'comments'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'comment_id'; // Khóa chính là `post_id`

    protected $fillable = [
        'post_id',
        'user_id',
        'parent_comment_id',
        'content',
        'created_at',
        'updated_at'
    ];

    public function addComment($post_id, $curentUserId, $content)
    {
        $newComment = new self();

        $newComment->post_id = $post_id;
        $newComment->user_id = $curentUserId;
        $newComment->content = $content;
        $newComment->save();

        return $newComment;
    }

    public function getCommentById($comment_id)
    {
        return $comment = self::Join('users', 'users.user_id', '=', 'comments.user_id')
            ->where('comment_id', $comment_id)
            ->select('comments.*', 'users.username', 'users.profile_pic_url')
            ->first();
    }

    public function getAllCommentByPostId($post_id)
    {
        return $comment = self::orderBy('comments.created_at', 'desc')
            ->Join('users', 'users.user_id', '=', 'comments.user_id')
            ->where('post_id', $post_id)
            ->select('comments.*', 'users.username', 'users.profile_pic_url')
            ->get();
    }
}
