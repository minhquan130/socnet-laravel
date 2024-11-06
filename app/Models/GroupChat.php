<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    // Đặt tên bảng nếu khác với tên mặc định (số nhiều)
    protected $table = 'group_chats'; // Thay đổi tên bảng nếu cần

    // Đặt khóa chính
    protected $primaryKey = 'group_id';

    // Khai báo các cột có thể gán
    protected $fillable = [
        'group_name',
    ];

    // Tùy chọn: Nếu muốn tự động quản lý timestamps
    public $timestamps = true;

    // Tùy chọn: Nếu muốn thay đổi định dạng timestamps
    // protected $dateFormat = 'U'; // định dạng timestamp

    // Nếu bạn không muốn Laravel tự động thêm các trường created_at và updated_at
    // public $timestamps = false;
}
