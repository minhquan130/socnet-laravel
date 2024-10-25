<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    function index()  {
        return view('profile');
    }
}