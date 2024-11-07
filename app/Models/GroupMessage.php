<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class GroupMessage extends Model
{
    // Đặt tên bảng nếu khác với tên mặc định (số nhiều)
    protected $table = 'group_messages'; // Thay đổi tên bảng nếu cần

    // Đặt khóa chính
    protected $primaryKey = 'message_id';

    // Tùy chọn: Nếu muốn tự động quản lý timestamps
    public $timestamps = true; // Không sử dụng timestamps tự động nếu không có `created_at` và `updated_at`

    // Khai báo các cột có thể gán
    protected $fillable = [
        'group_id',
        'sender_id',
        'content',
        'created_at',
    ];

    // Phương thức để thiết lập mối quan hệ với model Group
    public function group()
    {
        return $this->belongsTo(GroupChat::class, 'group_id');
    }

    // Phương thức để thiết lập mối quan hệ với model User (người gửi)
    public function sender()
    {
        return $this->belongsTo(Users::class, 'sender_id');
    }

    public function getGroupIdNewActive(){
        $currentUserId = Session::get('user_id');
        return self::where('sender_id', $currentUserId)->orderBy('created_at', 'desc')->first();
    }
}
