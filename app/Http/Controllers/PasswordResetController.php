<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
use Str;


class PasswordResetController extends Controller
{
// Hiển thị form yêu cầu quên mật khẩu
public function showForgotForm()
{
    return view('auth.passwords.forgot');
}

// Xử lý gửi email đặt lại mật khẩu
public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    // Tạo token reset mật khẩu
    $token = Str::random(64);

    // Lưu token vào bảng password_resets
    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
    ]);

    // Gửi email chứa link đặt lại mật khẩu
    Mail::send('auth.passwords.reset_email', ['token' => $token], function($message) use($request) {
        $message->to($request->email);
        $message->subject('Đặt lại mật khẩu');
    });

    return back()->with('message', 'Link đặt lại mật khẩu đã được gửi tới email của bạn.');
}

// Hiển thị form để đặt lại mật khẩu mới
public function showResetForm($token)
{
    return view('auth.passwords.reset', ['token' => $token]);
}

// Xử lý cập nhật mật khẩu mới
public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed|min:6',
        'token' => 'required'
    ]);

    // Kiểm tra token trong bảng password_resets
    $passwordReset = DB::table('password_resets')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

    if (!$passwordReset) {
        return back()->withErrors(['email' => 'Token không hợp lệ!']);
    }

    // Cập nhật mật khẩu mới cho user
    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    // Xóa token sau khi sử dụng
    DB::table('password_resets')->where(['email' => $request->email])->delete();

    return redirect()->route('login')->with('message', 'Mật khẩu của bạn đã được cập nhật thành công!');
}
}