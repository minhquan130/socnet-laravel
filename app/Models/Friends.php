<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    public $incrementing = false;
    protected $primaryKey = null;
    protected $fillable = ['user_id', 'friend_id', 'status'];
    protected $table = 'friends';

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function friends()
    {
        return $this->belongsTo(Users::class, 'friend_id');
    }

    public function groupMembers()
    {
        return $this->belongsTo(GroupMember::class, 'user_id', 'user_id');
    }

    function getFriendsByStatus($currentUserId, $status)
    {
        return self::where('friend_id', $currentUserId)->whereIn('status', (array) $status)->with('users', 'groupMembers')->get();
    }
}
