<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    static function search(Request $request)
    {
        $resultContentPost = Posts::select('*')
            ->whereRaw("MATCH(content) AGAINST(? IN NATURAL LANGUAGE MODE)", [$request->input('search')])
            ->get();

        $resultUsername = Users::select('*')
            ->whereRaw("MATCH(username) AGAINST(? IN NATURAL LANGUAGE MODE)", [$request->input('search')])
            ->get();

        $result = $resultContentPost->merge($resultUsername);
        dd($result);
    }
}
