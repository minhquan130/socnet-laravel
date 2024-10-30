<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    //
    public function index(){
        return view ('logout');
    }
    public function store(Request $request)
    {
        // Hủy session của người dùng
        Session::invalidate();
        Session::regenerateToken();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        
        // Thêm thông báo vào session
        // $request->session()->flash('status', 'Bạn đã đăng xuất thành công!');
        Session::flash('status', 'Bạn đã đăng xuất thành công!');

        // Chuyển hướng đến trang login
        return redirect('login'); // Hoặc return redirect()->route('login');
    }
}
