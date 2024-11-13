<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;
use Str;


class PasswordResetController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgetpassword');
    }

    public function sendResetOtp(Request $request)
    {
    
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $otp = random_int(100000, 999999); // Tạo OTP ngẫu nhiên
        $email = $request->email;

        // Lưu OTP vào bảng password_resets hoặc cập nhật nếu tồn tại
        PasswordReset::updateOrCreate(
            ['email' => $email],
            ['otp' => $otp, 'created_at' => Carbon::now()]
        );
  

        // Gửi OTP qua email
        Mail::to($email)->send(new OtpMail($otp));

        return back()->with('message', 'OTP đã được gửi đến email của bạn.');
    }

    public function verifyOtp(Request $request)
    {
        

        $request->validate([
            'email' => 'required|email|exists:password_resets,email',
            'otp' => 'required|digits:6',
        ]);

        $email = $request->input('email'); // Hoặc $request->email
        $otp = $request->input('otp');     // Hoặc $request->otp

        if (!$email || !$otp) {
            return back()->withErrors(['error' => 'Email hoặc OTP không hợp lệ.']);
        }
        // Kiểm tra OTP trong bảng password_resets
        $passwordReset = PasswordReset::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        // Nếu không tìm thấy OTP hợp lệ hoặc OTP hết hạn
        if (!$passwordReset || $passwordReset->created_at->diffInMinutes(Carbon::now()) > 15) {
            return back()->withErrors(['otp' => 'OTP không hợp lệ hoặc đã hết hạn.']);
        }

        // Nếu OTP hợp lệ và chưa hết hạn, chuyển hướng đến trang đặt lại mật khẩu
        return view('auth.resetpassword', ['email' => $request->email]);
       


    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Tìm người dùng theo email
        $user = Users::where('email', $request->email)->first();

        // Cập nhật mật khẩu mới cho người dùng
        $user->update([
            'password_hash' => Hash::make($request->password)  // Dùng Hash::make để mã hóa mật khẩu
        ]);

        // Xóa bản ghi OTP trong bảng password_resets
        PasswordReset::where('email', $request->email)->delete();

        // Chuyển hướng người dùng đến trang đăng nhập với thông báo thành công
        return redirect('/login')->with('message', 'Mật khẩu của bạn đã được thay đổi thành công.');
    }
}