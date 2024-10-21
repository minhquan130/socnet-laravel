<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    // CRUD
    // Them - Create - C
    public function registerUser() {
        return view('register');
    }

    // Doc - Read - R
    public function index()  {
        // return view('user');
    }

    // Cap nhat - Update - U
    public function editUser()  {
        
    }

    // Xóa - Delete - D
    public function deleteUser()  {
        
    }
}
