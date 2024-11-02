<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // Tên bảng
    protected $table = 'users';

    // Khóa chính
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'email',
        'password_hash',
        'profile_pic_url',
        'bio',
        'date_of_birth',
        'privacy_setting',
        'created_at',
        'updated_at'
    ];
}
