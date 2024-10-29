<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'comment_id'; // Khóa chính là `post_id`

    protected $fillable = [
        'post_id',
        'user_id',
        'parent_comment_id',
        'content',
        'created_at'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
