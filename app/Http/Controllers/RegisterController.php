<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    function index()  {
        return view('register');
    }

    function store(Request $request) {
        $user = new User();
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        $user->password_hash = $request->input('password');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('status', 'Tạo mới tài khoản thành công');
    }
}