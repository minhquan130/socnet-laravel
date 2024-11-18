<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{ 
   
    // Tên bảng
    protected $table = 'password_resets';

    // Tắt timestamps vì bảng password_resets không có cột updated_at
    public $timestamps = false;

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

    /**
     * Phương thức kiểm tra tính hợp lệ của token.
     * 
     * @param string $email
     * @param string $token
     * @return mixed Trả về bản ghi nếu hợp lệ, ngược lại trả về null
     */
    public static function validateToken($email, $token)
    {
        // Kiểm tra xem có bản ghi token hợp lệ cho email này không
        $passwordReset = self::where('email', $email)
            ->where('token', $token)
            ->where('created_at', '>=', Carbon::now()->subMinutes(15)) // Token có hiệu lực trong 15 phút
            ->first();
        
        return $passwordReset;
    }
}