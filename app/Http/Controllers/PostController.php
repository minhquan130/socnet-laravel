<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function addPost(Request $request)
    {
        if ($request->input('input-content') || $request->file('input-picture')) {
            // Điều kiện kiểm tra dữ liệu đầu vào
            $request->validate([
                'input-content' => 'nullable|string|max:65535',
                'input-picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            ]);

            $currentUserId = Session::get('user_id');

            // Tạo đối tượng bài viết mới
            $post = new Posts();
            $post->user_id = $currentUserId; // Hoặc lấy ID người dùng hiện tại
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

    public function like(Request $request, $id)
    {
        $like = new Likes();

        $result = $like->checkLike($id);
        $count_like = $like->getCountLikeById($id);

        return [$result, $count_like];
    }

    public function updatePost(Request $request, $id)
    {
        $post = Posts::find($id);
    
        if (!$post) {
            return redirect()->back()->with('error', 'Bài viết không tồn tại.');
        }
    
        // Validate nội dung và ảnh
        $request->validate([
            'input-content' => 'nullable|string|max:65535',
            'input-picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);
    
        // Cập nhật nội dung
        $post->content = $request->input('input-content');
    
        // Kiểm tra và cập nhật ảnh nếu có
        if ($request->hasFile('input-picture') && $request->file('input-picture')->isValid()) {
            $image = $request->file('input-picture');
            $extension = $image->getClientOriginalExtension();
            $imageData = base64_encode(file_get_contents($image->getRealPath()));
    
            // Lưu ảnh mới dưới dạng base64
            $post->media_url = 'data:image/' . $extension . ';base64,' . $imageData;
        }
    
        $post->save();
    
        return redirect()->route('home')->with('success', 'Bài viết đã được cập nhật thành công!');
    }
    
    
}

