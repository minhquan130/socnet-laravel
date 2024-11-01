<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comments; // Đảm bảo bạn đã import model Comments
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    // Định nghĩa thuộc tính $newComment để dùng trong các phương thức
    protected $newComment;

    public function __construct()
    {
        // Khởi tạo model Comments
        $this->newComment = new Comments();
    }

    function getAllCommentByPostId($post_id)
    {
        $comments = $this->newComment->getAllCommentByPostId($post_id);
        dd($comments);

        return $comments;
    }

    public function addComment(Request $request)
    {
        $currentUserId = Session::get('user_id'); // Đảm bảo rằng bạn đã lưu user_id vào session
        $post_id = $request->input('post-id'); // Kiểm tra tên input có đúng không
        $content = $request->input('comment');

        // Gọi phương thức để thêm bình luận
        $newComment = $this->newComment->addComment($post_id, $currentUserId, $content);
        $dataComment = $this->newComment->getCommentById($newComment->comment_id);

        // Trả về phản hồi JSON
        return response()->json(['message' => 'Comment added successfully', 'dataComment' => $dataComment]);
    }
}
