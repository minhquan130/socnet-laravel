<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

// use Illuminate\Http\Request;

class ChatController extends Controller
{
    function index() {
        $currentUserId = Session::get('user_id');
        $userCurrent = Users::where('user_id', $currentUserId)->first();
        return view('chats', compact('userCurrent'));
    }
}
