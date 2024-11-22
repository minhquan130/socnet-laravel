<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    //
    static function search(Request $request)
    {
        $userCurrent = Users::find(Session::get('user_id'));
        $resultContentPost = Posts::select('*')
            ->whereRaw("MATCH(content) AGAINST(? IN NATURAL LANGUAGE MODE)", [$request->input('search')])
            ->get();

        $resultUsername = Users::select('*')
            ->where('username', 'LIKE', '%' . $request->input('search') . '%')
            ->get();

        return view('search', compact('userCurrent', 'resultContentPost', 'resultUsername'));
    }
}
