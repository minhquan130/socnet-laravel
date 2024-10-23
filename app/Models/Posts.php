<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $fillable = [
        'user_id',
        'content',
        'media_url',
        'created_at',
        'updated_at'
        ];
}
