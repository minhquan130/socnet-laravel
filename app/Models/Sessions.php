<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    // Tên bảng
    protected $table = 'sessions'; // Điều chỉnh tên bảng nếu bảng của bạn có tên khác

    // Khóa chính
    protected $primaryKey = 'id'; // Tên khóa chính
    public $incrementing = false; // Khóa chính không tự động tăng
    protected $keyType = 'string'; // Kiểu khóa chính là chuỗi

    // Các cột có thể được điền
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];

    // Nếu không cần timestamps, bạn có thể tắt chúng
    public $timestamps = false;
}
