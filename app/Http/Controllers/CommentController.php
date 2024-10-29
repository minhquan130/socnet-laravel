<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comments; // Đảm bảo bạn đã import model Comments
use App\Models\Post; // Nếu bạn có model Post để lấy bài viết
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }
    public function store(Request $request, $id)
    {
        // 1. Xác thực dữ liệu đầu vào
    $request->validate([
        'content' => 'required|max:255', // Nội dung bình luận là bắt buộc và không quá 255 ký tự
    ]);

    // 2. Tìm bài viết bằng ID
    $post = Post::findOrFail($postId);

    // 3. Tạo bình luận mới
    $comment = new Comment([
        'user_id' => auth()->id(), // Nếu người dùng đã đăng nhập, lưu ID của người dùng
        'content' => $request->input('content'), // Lấy nội dung bình luận từ yêu cầu
    ]);

    // 4. Gắn bình luận với bài viết
    $post->comments()->save($comment);

    // 5. Chuyển hướng trở lại với thông báo thành công
    return redirect()->back()->with('success', 'Bình luận đã được thêm thành công!');
    }
}