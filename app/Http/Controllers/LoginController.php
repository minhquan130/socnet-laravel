<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    function index()
    {
        return view('login');
    }

    function store(Request $request)
    {
        $user = new User();

        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();


        if ($user) {
            // Người dùng được tìm thấy
            if ($user->password_hash == $password) {
                return view('home');
            }
        }
        // Không tìm thấy người dùng
        return view('login');
    }
}
