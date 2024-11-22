<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;
use App\Models\Share;

class Posts extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';


    protected $fillable = ['user_id', 'content', 'media_url', 'created_at', 'updated_at','shared_post_id'];

    // Định nghĩa quan hệ với Comments
    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id', 'post_id');
        // 'post_id' là khóa ngoại trong bảng comments và khóa chính trong bảng posts
    }

    public static function getHomePosts()
    {
        return self::orderBy('posts.created_at', 'desc')
            ->join('users', 'users.user_id', '=', 'posts.user_id')
            ->select('posts.*', 'users.username', 'users.email', 'users.profile_pic_url')
            ->get();
    }
      // Người tạo bài viết
     // Quan hệ người dùng
     public function user()
     {
         return $this->belongsTo(Users::class, 'user_id'); // user_id là khóa ngoại trong bảng posts
     }
  
      // Bài viết được chia sẻ
      public function sharedPost()
      {
          return $this->belongsTo(Posts::class, 'shared_post_id')->join('users', 'users.user_id', '=', 'posts.user_id');
      }
  
      // Danh sách bài viết chia sẻ bài gốc
      public function sharedByPosts()
      {
          return $this->hasMany(Posts::class, 'shared_post_id');
      }
}
