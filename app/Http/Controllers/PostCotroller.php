<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Cookie;

class PostCotroller extends Controller
{

    public function showPosts()
    {
        // $posts = Posts::all(); // Lấy tất cả bài viết từ cơ sở dữ liệu
        $posts = Posts::orderBy('created_at', 'desc')->get();
        // return Cookie::get('laravel_session');
        return view('home', compact('posts')); // Truyền dữ liệu đến view
    }

    public function addPost(Request $request)
    {
        $post = new Posts();
        $post->user_id = 1; // Hoặc lấy ID người dùng hiện tại
        $post->content = $request->input('input-content', '');

    // Kiểm tra xem người dùng có upload file ảnh hay không
        if ($request->hasFile('input-picture') && $request->file('input-picture')->isValid()) {
            $image = $request->file('input-picture');

            // Lấy phần mở rộng của file
            $extension = $image->getClientOriginalExtension();

            // Lấy nội dung của file và mã hóa base64
            $imageData = base64_encode(file_get_contents($image->getRealPath()));

            // Lưu ảnh dưới dạng base64
            $post->media_url = 'data:image/' . $extension . ';base64,' . $imageData;
        }
        

        // Lưu bài viết vào cơ sở dữ liệu
        $post->save();

        return redirect()->route('home')->with('success', 'Bài viết đã được đăng thành công!');
    }
}