<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Cookie;

class PostController extends Controller
{

    public function showPosts()
    {
        $posts = Posts::orderBy('created_at', 'desc')->get();
        // return Cookie::get('laravel_session');
        return view('home', compact('posts')); // Truyền dữ liệu đến view
    }

    public function addPost(Request $request)
    {
        if ($request->input('input-content') || $request->file('input-picture')) {

            // Điều kiện kiểm tra dữ liệu đầu vào
            $request->validate([
                'input-content' => 'nullable|string|max:500', // Nội dung bài viết là bắt buộc, tối đa 500 ký tự
                'input-picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // File ảnh (tùy chọn), chỉ chấp nhận các định dạng ảnh với dung lượng tối đa 2MB
            ]);

            // Tạo đối tượng bài viết mới
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
        }
        return redirect()->route('home')->with('success', 'Bài viết đã được đăng thành công!');
    }

    public function deletePost($id)
    {
        $post = Posts::where('post_id', $id)->first();

        if (!$post) {
            return redirect()->back()->with('error', 'Bài viết không tồn tại.');
        }

        $post->delete();
        return redirect()->route('home')->with('success', 'Bài viết đã được xóa.');
    }
}
