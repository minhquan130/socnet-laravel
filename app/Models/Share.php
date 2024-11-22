<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    protected $table = 'shares';
    protected $fillable = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
