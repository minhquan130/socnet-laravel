<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostCotroller extends Controller
{
    //
    function addPost(Request $request) {
        $post = new Posts();
        $post->user_id = 1;
        $post->content = $request->input('input-content', '');
        $post->media_url = "";
        $post->created_at = now();
        $post->updated_at = now();
        $post->save();
    }
}
