<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    public $incrementing = false;
    protected $primaryKey = null;
    protected $fillable = ['user_id', 'friend_id', 'status'];

    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_BLOCKED = 'blocked';

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    function getFriendsByStatus($currentUserId, $status)
    {
        return self::where('friend_id', $currentUserId)->whereIn('status', (array) $status)->with('users')->get();
    }
}
