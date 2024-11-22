<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Share;

class ShareController extends Controller
{
    public function share(Request $request, $postId)
    {
        $request->validate([
          'post_id' => 'required|exists:posts,id',
        'user_id' => 'required|exists:users,id',
        'shared_by' => 'required|exists:users,id',
        ]);
    
        $post = Posts::findOrFail($postId);
    
        Share::create([
            'user_id' => session('user_id'), // Người chia sẻ
            'post_id' => $postId,
            'friend_id' => $request->friend_id,
            'visibility' => $request->visibility,
        ]);
    
        return response()->json(['message' => 'Đã chia sẻ bài viết thành công!']);
    }

    public function sharedWith($postId)
{
    $post = Posts::with(['shares.user', 'shares.friend'])->findOrFail($postId);

    return view('posts.shared_with', compact('post'));
}

    

}