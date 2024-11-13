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
        'otp',
        'created_at',
    ];

    // Tạo một phương thức để kiểm tra OTP và cập nhật thông tin
    public static function validateOtp($email, $otp)
    {$passwordReset = PasswordReset::validateOtp($request->email, $request->otp);

        if (!$passwordReset) {
            return back()->withErrors(['otp' => 'OTP không hợp lệ hoặc đã hết hạn.']);
        }
        

        // Lấy bản ghi có email và otp trùng khớp, và kiểm tra thời gian hết hạn
        return self::where('email', $email)
            ->where('otp', $otp)
            ->where('created_at', '>=', now()->subMinutes(15)) // OTP có hiệu lực trong 15 phút
            ->first();
    }

}