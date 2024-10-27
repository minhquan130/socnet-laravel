<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import Hash facade for hashing passwords

class RegisterController extends Controller
{
    //
    function index()  {
        return view('register');
    }

    public function store(Request $request) 
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]*$/', // Ensure the password meets your criteria
        ]);

        // Create a new user instance
        $user = new User();
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        $user->password_hash = Hash::make($request->input('password')); // Hash the password
        $user->created_at = now();
        $user->updated_at = now();
        $user->save(); // Save the user to the database

        // Redirect to login with success message
        return redirect()->route('login')->with('status', 'Tạo mới tài khoản thành công');
    }
}