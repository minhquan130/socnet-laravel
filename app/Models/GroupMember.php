<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class GroupMember extends Model
{
    protected $table = 'group_members';
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = true;

    protected $fillable = [
        'group_id',
        'user_id',
    ];
}
