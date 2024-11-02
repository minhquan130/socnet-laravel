<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    function getFriendsByStatus($currentUserId, $status)
    {
        return self::where('friend_id', $currentUserId)->whereIn('status', (array) $status)->with('users')->get();
    }
}
