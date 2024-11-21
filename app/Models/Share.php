<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    protected $table = 'shares';
    protected $fillable = ['user_id', 'post_id', 'friend_id', 'visibility'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Người nhận chia sẻ
    }
    
    public function sharedBy()
    {
        return $this->belongsTo(User::class, 'shared_by'); // Người chia sẻ
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id'); // Bài viết được chia sẻ
    }
    
}
