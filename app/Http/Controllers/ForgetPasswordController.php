<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    //
    function index() {
        return view('forgetpassword');
    }
}
