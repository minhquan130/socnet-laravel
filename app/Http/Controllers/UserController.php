<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //CRUD
    // Creater
    function register(Request $request) {
        $user = new Users();
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        $user->password_hash = $request->input('password');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect()->back()->with('status', 'Tạo mới tài khoản thành công');
    }
    
    // Read
    function getAllUsers() {
        return Users::all();        
    }

    // Update
    function editUser(Request $request) {
        $user = Users::find(1);
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        $user->password_hash = $request->input('password');
        // $user->created_at = now();
        $user->updated_at = now();
        $user->save();
    }

    // Delete
    function deleteUser() {
        $user = Users::find(1);
        $user->delete();
    }
}
