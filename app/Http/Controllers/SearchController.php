<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    static function search($keyword) {
        $result = Posts::select('*')->whereRaw("MATCH(content) AGAINST(? IN NATURAL LANGUAGE MODE)", [$keyword]);
        dd($result);
    } 
}
