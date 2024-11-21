<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Users;

class ShareController extends Controller
{
    public function share(Request $request, $postId)
    {
        // Kiểm tra bài viết có tồn tại không
        $post = Posts::findOrFail($postId);
        
        // Kiểm tra user gửi request
        $user = auth()->user(); // Nếu không dùng Auth, bạn có thể lấy user từ session
        
        // Thêm người bạn muốn chia sẻ
        $friendId = $request->input('friend_id');
        
        // Kiểm tra xem bạn bè có tồn tại không
        $friend = 

        // Lưu thông tin chia sẻ
        Share::create([
            'user_id' => $users->user_id,
            'post_id' => $post->post_id,
            'friend_id' => $friends->friend_id,
        ]);

        return response()->json([
            'message' => 'Bài viết đã được chia sẻ thành công!',
        ]);
    }
    public function show($postId)
{
    $post = Posts::findOrFail($postId);
    $friends = Users::where('id', '!=', auth()->id())->get(); // Lấy danh sách bạn bè ngoại trừ chính mình
    return view('post', compact('post', 'friends'));
}
public function sharedPosts()
{
    $userId = auth()->id(); // Hoặc lấy user từ session
    $sharedPosts = Share::where('friend_id', $userId)
                        ->with('post')
                        ->get();

    return view('shared_posts', compact('sharedPosts'));
}

}