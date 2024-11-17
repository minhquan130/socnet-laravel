<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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

    public static function createNewUser($data)
    {
        return self::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password_hash' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['birth_date'],
        ]);
    }

    public function handleAvatar($file)
    {
        if ($file && $file->isValid()) {
            $extension = $file->getClientOriginalExtension();
            $imageData = base64_encode(file_get_contents($file->getRealPath()));

            // Lưu avatar dưới dạng Base64
            $this->profile_pic_url = sprintf('data:image/%s;base64,%s', $extension, $imageData);
            $this->save(); // Cập nhật model
        }
    }

    public static function encodeAvatarToBase64($file)
    {
        if ($file && $file->isValid()) {
            $extension = $file->getClientOriginalExtension();
            $imageData = base64_encode(file_get_contents($file->getRealPath()));

            return sprintf('data:image/%s;base64,%s', $extension, $imageData);
        }
        return null; // Trả về null nếu không hợp lệ
    }
}
