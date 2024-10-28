<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comments; // Đảm bảo bạn đã import model Comments
use App\Models\Post; // Nếu bạn có model Post để lấy bài viết
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    // Hiển thị danh sách các bài viết
    public function index()
    {
        // Lấy tất cả bài viết
        $posts = Post::all(); // Hoặc theo điều kiện bạn muốn

        return view('index', compact('posts')); // Truyền biến $posts vào view
    }


    public function store(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Lưu bình luận
        Comments::create([
            'post_id' => $id,
            'content' => $request->comment,
            // Có thể thêm thông tin người dùng hoặc các trường khác nếu cần
        ]);

        return response()->json(['message' => 'Bình luận đã được thêm'], 201);
    }
}