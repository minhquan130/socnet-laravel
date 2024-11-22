<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Share;

class ShareController extends Controller
{
    public function sharePost(Request $request, $postId)
    {
        $post = Posts::find($postId);
    
        if (!$post) {
            return redirect()->back()->with('error', 'Bài viết không tồn tại!');
        }
    
        Share::create([
            'user_id' => auth()->id(), // Hoặc lấy user_id từ session
            'post_id' => $postId,
        ]);
    
        return redirect()->back()->with('success', 'Chia sẻ bài viết thành công!');
    }
    

    

}