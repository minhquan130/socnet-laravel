<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\GroupChat;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Comments;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function getUserId()
    {
        return response()->json([
            'userId' => Session::get('user_id')
        ]);
    }

    //CRUD
    // Creater
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]*$/',
            'gender' => 'required|in:male,female,other',
            'birth_date' => 'required|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $user = Users::createNewUser($validatedData);

        // Xử lý avatar nếu có
        if ($request->hasFile('avatar')) {
            $user->handleAvatar($request->file('avatar'));
        }

        // Hủy session của người dùng
        Session::invalidate();
        Session::regenerateToken();

        // Redirect to login with success message
        return redirect()->route('login')->with('status', 'Tạo mới tài khoản thành công');
    }

    function showRegister()
    {
        // for ($i = 0; $i < 10; $i++) {
        //     # code...
        //     $newUser = new Users();
        //     Users::create([
        //         'username' => 'Quân ' . $i,
        //         'email' => 'quan' . $i . '@gmail.com',
        //         'password_hash' => Hash::make('123456'),
        //         'gender' => 'male',
        //         'date_of_birth' => now(),
        //     ]);
        // }

        // for ($i = 1; $i < 5; $i++) {
        //     $newFriend = new Friends();
        //     $newFriend->user_id = $i;
        //     $newFriend->friend_id = 5;
        //     $newFriend->save();
        // }

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
        $validatedData = $request->validate([
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
        // Gọi phương thức authenticate từ model
        $user = Users::authenticate($email, $password);

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

        $userCurrent = Users::find($currentUserId);
        $posts = Posts::getHomePosts();
        $create_comment = Comments::latest()->get();
        $followers = Friends::getFriendsByStatus($currentUserId, ['pending', 'following']);
        $friends = Friends::getFriendsByStatus($currentUserId, 'accepted');

        return view('home', compact('posts', 'userCurrent', 'create_comment', 'followers', 'friends'));
    }

    public function showFriendsRequest()
    {
        $currentUserId = Session::get('user_id');
        $userIds = Friends::getPendingRequests($currentUserId);
        $users = $userIds->isNotEmpty() ? Users::getUsersByIds($userIds) : collect();
        $userCurrent = Users::find($currentUserId);

        return view('friends', compact('users', 'userCurrent'));
    }
    function showFriends()
    {
        // Lấy user_id của người dùng đang đăng nhập
        $currentUserId = Session::get('user_id');

        // Lấy danh sách friend_id từ bảng friends
        $userIds = Friends::where('friend_id', $currentUserId)->pluck('user_id');
        $friendIds = Friends::where('user_id', $currentUserId)->pluck('friend_id');

        // Kết hợp cả userIds và friendIds để tìm tất cả các bạn bè của người dùng
        $allFriendsIds = $userIds->merge($friendIds)->unique();

        // Lấy danh sách người dùng, loại trừ người dùng đang đăng nhập và các friend_id
        $users = Users::where('user_id', '!=', $currentUserId) // Loại trừ người dùng đang đăng nhập
            ->whereNotIn('user_id', $allFriendsIds) // Loại trừ tất cả bạn bè
            ->get();

        $userCurrent = Users::where('user_id', $currentUserId)->first();
        return view('friends', compact('users', 'userCurrent')); // Trả về view với danh sách người dùng
    }


    public function addFriends($id)
    {
        $currentUserId = Session::get('user_id');

        // Kiểm tra xem yêu cầu kết bạn đã tồn tại chưa
        $existingFriendRequest = Friends::where('user_id', $id)
            ->where('friend_id', $currentUserId)
            ->first();

        if ($existingFriendRequest) {
            // Nếu yêu cầu kết bạn đã tồn tại, cập nhật trạng thái thành 'accepted'
            $this->updateFriendRequest($id, $currentUserId, 'accepted');

            // Tạo bạn bè ngược lại
            $this->updateFriendRequest($currentUserId, $id, 'accepted');

            // Tạo nhóm chat mới và thêm các thành viên
            $groupId = $this->createGroupChat($currentUserId, $id);

            return redirect()->route('friends.request');
        } else {
            // Nếu chưa tồn tại, tạo yêu cầu kết bạn mới với trạng thái 'pending'
            $newFriendRequest = new Friends();
            $newFriendRequest->user_id = $currentUserId;
            $newFriendRequest->friend_id = $id;
            $newFriendRequest->status = 'pending';
            $newFriendRequest->save();

            return redirect()->route('friends');
        }
    }

    // Cập nhật trạng thái kết bạn
    private function updateFriendRequest($userId, $friendId, $status)
    {
        Friends::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->update(['status' => $status]);
    }

    // Tạo nhóm chat mới và thêm thành viên
    private function createGroupChat($currentUserId, $friendId)
    {
        // Tạo nhóm chat mới
        $newGroupChat = new GroupChat();
        $newGroupChat->save();
        $groupId = $newGroupChat->group_id;

        // Thêm thành viên vào nhóm chat
        GroupMember::create([
            'group_id' => $groupId,
            'user_id' => $currentUserId,
        ]);

        GroupMember::create([
            'group_id' => $groupId,
            'user_id' => $friendId,
        ]);

        return $groupId;
    }

    public function sendOtp(Request $request)
    {
        // dd(true);
        // Validate email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Tạo mã OTP ngẫu nhiên
        $otpCode = Str::random(6); // Hoặc sử dụng mt_rand(100000, 999999) cho mã số 6 chữ số

        // Lưu mã OTP vào session hoặc cơ sở dữ liệu để kiểm tra sau
        $request->session()->put('otp_code', $otpCode);
        $request->session()->put('otp_expires_at', now()->addMinutes(5)); // Đặt thời gian hết hạn OTP

        // Gửi email
        Mail::to($request->email)->send(new OtpMail($otpCode));

        return response()->json(['message' => 'OTP code has been sent to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp_code' => 'required',
        ]);

        $otpCode = $request->session()->get('otp_code');
        $otpExpiresAt = $request->session()->get('otp_expires_at');

        if ($otpCode && $otpExpiresAt && now()->lessThanOrEqualTo($otpExpiresAt)) {
            if ($request->otp_code == $otpCode) {
                // OTP hợp lệ
                $request->session()->forget(['otp_code', 'otp_expires_at']);
                return response()->json(['message' => 'OTP verified successfully.']);
            } else {
                return response()->json(['message' => 'Invalid OTP code.'], 400);
            }
        }

        return response()->json(['message' => 'OTP code has expired.'], 400);
    }
}
