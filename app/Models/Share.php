<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    protected $table = 'share';
    protected $fillable = ['user_id', 'post_id', 'friend_id'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }

    public function friend()
    {
        return $this->belongsTo(friends::class, 'friend_id');
    }
}
