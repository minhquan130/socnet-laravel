<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Posts;
use App\Models\Friends;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    public function index($userId)
    {
        // Lấy thông tin người dùng theo $userId (không phải Session)
        $userCurrent = Users::findOrFail($userId); 
        
        // Cập nhật lại ngày sinh nếu có
        if ($userCurrent->date_of_birth) {
            $userCurrent->date_of_birth = date('d/m/Y', strtotime($userCurrent->date_of_birth));
        }
        
        // Cập nhật giới tính
        $userCurrent->gender = match ($userCurrent->gender) {
            'male' => 'Nam',
            'female' => 'Nữ',
            'other' => 'Giới tính khác',
            default => 'Chưa cập nhật',
        };
        

        // Lấy tất cả các bài đăng của người dùng
        $posts = Posts::where('user_id', $userCurrent->user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Truyền cả thông tin người dùng và bài đăng vào view profile
        return view('profile', compact('userCurrent', 'posts'));
    }




    public function update(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'username' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'gender' => 'required|string',
            'date_of_birth' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'relationship' => 'nullable|string|max:255',
        ]);

        // Lấy thông tin người dùng hiện tại từ cơ sở dữ liệu
        $user = Users::where('user_id', Session::get('user_id'))->first();

        if (!$user) {
            return redirect()->route('profile')->with('error', 'Không tìm thấy người dùng.');
        }

        // Cập nhật các trường cần thiết
        $user->username = $request->input('username');
        $user->address = $request->input('address', $user->address);
        $user->bio = $request->input('bio', $user->bio);
        $user->company = $request->input('company', $user->company);
        $user->relationship = $request->input('relationship', $user->relationship);
        $user->gender = $request->input('gender');
        
        // Cập nhật ngày sinh nếu có
        if ($request->filled('date_of_birth')) {
            $user->date_of_birth = $request->input('date_of_birth');
        }
        // Xử lý avatar nếu có
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            
            if ($image->isValid()) {  // Kiểm tra tính hợp lệ của file
                $extension = $image->getClientOriginalExtension();
                $imageData = base64_encode(file_get_contents($image->getRealPath()));
                // $this->profile_pic_url = 
                $user->profile_pic_url = sprintf('data:image/%s;base64,%s', $extension, $imageData);
            } else {
                return redirect()->back()->withErrors(['avatar' => 'Ảnh không hợp lệ.']);
            }
        }
        
        // Lưu thông tin vào cơ sở dữ liệu
        $user->save(); 

        $user->gender_label = match ($user->gender) {
            'male' => 'Nam',
            'female' => 'Nữ',
            'other' => 'Giới tính khác',
            default => 'Chưa cập nhật',
        };

        // Trả về lại trang profile với thông báo thành công
        return redirect()->route('profile', ['userId' => $user->user_id])->with('success', 'Cập nhật thông tin thành công!')->with('updatedUser', $user);
    }

}