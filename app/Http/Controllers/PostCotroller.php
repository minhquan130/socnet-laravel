<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostCotroller extends Controller
{

    public function showPosts()
    {
        // $posts = Posts::all(); // Lấy tất cả bài viết từ cơ sở dữ liệu
        $posts = Posts::orderBy('created_at', 'desc')->get();
        return view('home', compact('posts')); // Truyền dữ liệu đến view
    }

    public function addPost(Request $request)
    {
        $post = new Posts();
        $post->user_id = 1; // Hoặc lấy ID người dùng hiện tại
        $post->content = $request->input('input-content', '');
        if ($request->input('input-picture')) {
            # code...
            $image = $request->input('input-picture');
            // Lấy phần mở rộng của file
            $extension = pathinfo($image, PATHINFO_EXTENSION);

            $imageData = base64_encode($image);
            $post->media_url = 'data:image/'.$extension.';base64,' . $imageData; // Lưu hình ảnh dưới dạng base64
        }

        // Lưu bài viết vào cơ sở dữ liệu
        $post->save();

        return redirect()->route('home')->with('success', 'Bài viết đã được đăng thành công!');
    }
}
