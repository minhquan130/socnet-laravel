<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $post = Posts::findOrFail($request->post_id);
        $post->likes_count += 1; // Hoặc xử lý tăng giảm tùy vào logic like/unlike
        $post->save();

        return response()->json(['likes_count' => $post->likes_count]);
    }
}
