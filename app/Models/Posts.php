<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;

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
    //  làm thêm 
     // Định nghĩa quan hệ với Comments
     public function comments()
     {
         return $this->hasMany(Comments::class, 'post_id', 'post_id'); 
         // 'post_id' là khóa ngoại trong bảng comments và khóa chính trong bảng posts
     }
}
