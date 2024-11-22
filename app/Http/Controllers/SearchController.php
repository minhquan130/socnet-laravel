<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friends;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    //
    static function search(Request $request)
    {
        $userCurrentId = Session::get('user_id');
        $userCurrent = Users::find($userCurrentId);
        $resultContentPost = Posts::select('*')
            ->where('content', 'LIKE', '%' . $request->input('keyword') . '%')
            ->join('users', 'users.user_id', '=', 'posts.user_id')
            ->get();

        // dd($resultContentPost);

        $resultUsername = Users::select('*')
            ->where('username', 'LIKE', '%' . $request->input('keyword') . '%')
            ->whereNot('user_id', $userCurrentId)
            ->limit(4)
            ->get();

        foreach ($resultUsername as $user) {
            $isFriend = Friends::where('user_id', $userCurrentId)
                ->where('friend_id', $user->user_id)
                ->first();
            if ($isFriend) {
                $user->isFriend = true;
            } else {
                $user->isFriend = false;
            }
        }

        return view('search', compact('userCurrent', 'resultContentPost', 'resultUsername'));
    }

    static function searchUser(Request $request)
    {
        $userCurrentId = Session::get('user_id');
        $userCurrent = Users::find($userCurrentId);

        $resultUsername = Users::select('*')
            ->where('username', 'LIKE', '%' . $request->input('keyword') . '%')
            ->whereNot('user_id', $userCurrentId)
            ->get();

        foreach ($resultUsername as $user) {
            $isFriend = Friends::where('user_id', $userCurrentId)
                ->where('friend_id', $user->user_id)
                ->first();
            if ($isFriend) {
                $user->isFriend = true;
            } else {
                $user->isFriend = false;
            }
        }

        return view('search', compact('userCurrent',  'resultUsername'));
    }

    static function searchPost(Request $request)
    {
        $userCurrentId = Session::get('user_id');
        $userCurrent = Users::find($userCurrentId);

        $resultContentPost = Posts::select('*')
            ->where('content', 'LIKE', '%' . $request->input('keyword') . '%')
            ->join('users', 'users.user_id', '=', 'posts.user_id')
            ->get();

        return view('search', compact('userCurrent',  'resultContentPost'));
    }
}
