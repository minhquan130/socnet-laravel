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

    // public function sendResetOtp(Request $request)
    // {
    
    //     $otp = random_int(100000, 999999); // Tạo OTP ngẫu nhiên
    //     $email = $request->email;

    //     // Lưu OTP vào bảng password_resets hoặc cập nhật nếu tồn tại
    //     PasswordReset::updateOrCreate(
    //         ['email' => $email],
    //         ['otp' => $otp, 'created_at' => Carbon::now()]
    //     );
  

    //     // Gửi OTP qua email
         
    //     Mail::send('emails.otp',compact('otp'),function($email){
    //         $email ->to('dinhvandat.06102003@gmail.com');
    //     });
     

    //     // $otp_email = new OtpMail($otp);
    //     // Mail::to('dinhvandat.06102003@gmail.com')->send($otp_email);

       

    //     return back()->with('message', 'OTP đã được gửi đến email của bạn.');
    // }

    // public function verifyOtp(Request $request)
    // {
        

    //     // Validate input
    // $request->validate([
    //     'email' => 'required|email|exists:users,email',
    //     'otp' => 'required|numeric',
    // ]);

    //    // Gọi phương thức validateOtp để kiểm tra OTP
    // $passwordReset = PasswordReset::validateOtp($request->email, $request->otp);

    //    // Kiểm tra nếu không tìm thấy bản ghi hợp lệ
    // if ($passwordReset === null) {
    //     return back()->withErrors(['otp' => 'OTP không hợp lệ hoặc đã hết hạn.']);
    // }


    //     // Nếu OTP hợp lệ và chưa hết hạn, chuyển hướng đến trang đặt lại mật khẩu
    //     return view('auth.resetpassword', ['email' => $request->email]);
       


    // }

    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email',
    //         'password' => 'required|min:8|confirmed',
    //     ]);

    //     // Tìm người dùng theo email
    //     $user = Users::where('email', $request->email)->first();

    //     // Cập nhật mật khẩu mới cho người dùng
    //     $user->update([
    //         'password_hash' => Hash::make($request->password)  // Dùng Hash::make để mã hóa mật khẩu
    //     ]);

    //     // Xóa bản ghi OTP trong bảng password_resets
    //     PasswordReset::where('email', $request->email)->delete();

    //     // Chuyển hướng người dùng đến trang đăng nhập với thông báo thành công
    //     return redirect('/login')->with('message', 'Mật khẩu của bạn đã được thay đổi thành công.');
    // }





    //tạp làm send mail:
    public function forgetpasswordEmail(Request $request){
        $request->validate([
            'email' => 'required|exists:users',
        ],[
            'email.required'  => 'Vui lòng nhập vào email đã đăng ký hợp lệ',
            'email.exists'  => 'Email không tồn tại trong hệ thống'

        ]);

        $user = Users::where('email', $request->email)->first();
        $user ->update(['token' => $token]);
        $token = strtoupper(Str::random(10));
       
            Mail::send('emails.otp',compact('user'),function($email) use($user){
                $email ->subject('Socnet - Lấy lại mật khẩu tài khoản');
                $email ->to($user->email,$user->name);
                 return redirect('/login')->with('yes', 'Vui lòng check Email để thực hiện thay đổi mật khẩu ');
       
          });
      
      
           

    }
}