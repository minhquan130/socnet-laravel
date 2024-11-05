<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //CRUD
    // Creater
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]*$/',
            'gender' => 'required|in:male,female,other',
            'birth_date' => 'required|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        // Create a new user instance
        $user = new Users();
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        $user->password_hash = Hash::make($request->input('password'));
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('birth_date');
        $user->created_at = now();
        $user->updated_at = now();

        // Handle avatar as Base64
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $image = $request->file('avatar');
            $extension = $image->getClientOriginalExtension();
            $imageData = base64_encode(file_get_contents($image->getRealPath()));
            $user->profile_pic_url = 'data:image/' . $extension . ';base64,' . $imageData;
        }

        $user->save(); // Save the user to the database

        // Hủy session của người dùng
        Session::invalidate();
        Session::regenerateToken();

        // Redirect to login with success message
        return redirect()->route('login')->with('status', 'Tạo mới tài khoản thành công');
    }

    function showRegister()
    {
        return view('register');
    }

    // Read
    function getAllUsers()
    {
        return Users::all();
    }

    // Update
    function forgetPassword(Request $request)
    {
        $user = Users::find(1);
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        $user->password_hash = $request->input('password');
        // $user->created_at = now();
        $user->updated_at = now();
        $user->save();
    }

    function showForgetPassword()
    {
        return view('forgetpassword');
    }

    // Delete
    function deleteUser()
    {
        $user = Users::find(1);
        $user->delete();
    }

    function showLogin()
    {
        if (Session::has('user_id') && Session::has('user_email') && Session::has('user_password')) {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        }
        return view('login');
    }
    function login(Request $request)
    {
        // Xác thực đầu vào với thông điệp lỗi tùy chỉnh
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Trường này không được bỏ trống.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Trường này không được bỏ trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Tìm người dùng theo email
        $user = Users::where('email', $email)->first();

        if (!$user) {
            // Nếu người dùng không tồn tại
            return redirect()->back()->withErrors(['email' => 'Tài khoản không tồn tại.']);
        }

        // Kiểm tra mật khẩu
        if (!Hash::check($password, $user->password_hash)) {
            return redirect()->back()->withErrors(['password' => 'Mật khẩu không đúng.']);
        }

        // Tạo session cho người dùng (nếu bạn muốn sử dụng session để lưu thông tin đăng nhập)
        Session::put(['user_id' => $user->user_id]);
        Session::put(['user_email' => $user->email]);
        Session::put(['user_password' => $user->password_hash]);

        // Chuyển hướng đến trang chính
        return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
    }

    function showHome()
    {
        $currentUserId = Session::get('user_id');
        $create_comment = Comments::orderBy('created_at', 'desc')->get();

        $posts = Posts::orderBy('posts.created_at', 'desc')
            ->Join('users', 'users.user_id', '=', 'posts.user_id')
            ->select('posts.*', 'users.username', 'users.email', 'users.profile_pic_url')
            ->get();

        $userCurrent = Users::where('user_id', $currentUserId)->first();
        $followers = (new Friends)->getFriendsByStatus($currentUserId, ['pending', 'following']);
        return view('home', compact('posts', 'userCurrent', 'create_comment', 'followers'));
    }

    function showFriendsRequest()
    {
        $currentUserId = Session::get('user_id');

        // Lấy danh sách user_id của những người đã gửi yêu cầu kết bạn
        $userIds = Friends::where('friend_id', $currentUserId)->where('status', 'pending')->pluck('user_id');

        // Nếu có yêu cầu kết bạn, lấy danh sách người dùng tương ứng
        $users = $userIds->isNotEmpty() ? Users::whereIn('user_id', $userIds)->get() : 'request';
        $userCurrent = Users::where('user_id', $currentUserId)->first();
        // $users = (new Friends)->getFriendsByStatus($currentUserId, ['pending']);

        return view('friends', compact('users', 'userCurrent'));
    }
    function showFriends()
    {
        // Lấy user_id của người dùng đang đăng nhập
        $currentUserId = Session::get('user_id');

        // Lấy danh sách friend_id từ bảng friends
        $userIds = Friends::all()->where('friend_id', $currentUserId)->pluck('user_id'); // Sử dụng pluck để lấy trực tiếp các friend_id
        $friendIds = Friends::all()->where('user_id', $currentUserId)->pluck('friend_id'); // Sử dụng pluck để lấy trực tiếp các friend_id

        // Lấy danh sách người dùng, loại trừ người dùng đang đăng nhập và các friend_id
        $users = Users::where('user_id', '!=', $currentUserId) // Loại trừ người dùng đang đăng nhập
            ->whereNotIn('user_id', $friendIds) // Loại trừ friend_id
            ->whereNotIn('user_id', $userIds) // Loại trừ user_id
            ->get();

        $userCurrent = Users::where('user_id', $currentUserId)->first();
        return view('friends', compact('users', 'userCurrent')); // Trả về view với danh sách người dùng
    }


    function addFriends($id)
    {
        $currentUserId = Session::get('user_id');
        $newFriend = Friends::where('user_id', $id)
        ->where('friend_id', $currentUserId)
        ->first();
        if ($newFriend) {
            $newFriend->update(['status' => Friends::STATUS_ACCEPTED]);
            return redirect()->route('friends.request');
        } else {
            $newFriend = new Friends();
            $newFriend->user_id = $currentUserId;
            $newFriend->friend_id = $id;
            $newFriend->save();
            return redirect()->route('friends');
        }

    }
}
