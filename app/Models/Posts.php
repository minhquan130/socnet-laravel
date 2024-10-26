<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'post_id'; // Khóa chính là `post_id`

    protected $fillable = [
        'user_id',
        'content',
        'media_url',
        'created_at',
        'updated_at'
    ];
}
