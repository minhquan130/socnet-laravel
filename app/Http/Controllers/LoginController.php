<?php

namespace App\Http\Controllers;

use App\Models\Users; // Sử dụng lớp Users
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }



    public function store(Request $request)
    {
        // Xác thực đầu vào với thông điệp lỗi tùy chỉnh
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Trường này không được bỏ trống.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Trường này không được bỏ trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Tìm người dùng theo email
        $user = Users::where('email', $email)->first();

        if (!$user) {
            // Nếu người dùng không tồn tại
            return redirect()->back()->withErrors(['email' => 'Tài khoản không tồn tại.']);
        }

        // Kiểm tra mật khẩu
        if (!Hash::check($password, $user->password_hash)) {
            return redirect()->back()->withErrors(['password' => 'Mật khẩu không đúng.']);
        }

        // Tạo session cho người dùng (nếu bạn muốn sử dụng session để lưu thông tin đăng nhập)
        session(['user_id' => $user->id]);

        // Chuyển hướng đến trang chính
        return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
    }
}
