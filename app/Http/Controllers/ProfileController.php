<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()  {
        $userCurrent = Users::where('user_id', Session::get('user_id'))->first();

        if ($userCurrent && $userCurrent->date_of_birth) {
            $userCurrent->date_of_birth = date('d/m/Y', strtotime($userCurrent->date_of_birth));
        }

        return view('profile', compact('userCurrent'));
    }

    public function update(Request $request){
       
    }
    
    
}