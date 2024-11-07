<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Post;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    public function index()  {
        $userCurrent = Users::where('user_id', Session::get('user_id'))->first();

        if ($userCurrent && $userCurrent->date_of_birth) {
            $userCurrent->date_of_birth = date('d/m/Y', strtotime($userCurrent->date_of_birth));
        }

        if ($userCurrent) {
            $userCurrent->gender = match($userCurrent->gender) {
                'male' => 'Nam',
                'female' => 'Nữ',
                'other' => 'Giới tính khác',
                default => 'Chưa cập nhật',
            };
        }
        return view('profile', compact('userCurrent'));
    }
    


    public function update(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'username' => 'required|string|max:255',  
            'gender' => 'required|string',
            'date_of_birth' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  //kiêm tra hình ảnh 
        ]);

        // Lấy thông tin người dùng hiện tại từ cơ sở dữ liệu
        $user = Users::where('user_id', Session::get('user_id'))->first();

        if (!$user) {
            return redirect()->route('profile.index')->with('error', 'Không tìm thấy người dùng.');
        }

        // dd($request->input('gender'));

        // Cập nhật các trường cần thiết
        $user->username = $request->input('username');  
        $user->gender = $request->input('gender'); 
        $user->date_of_birth = $request->input('date_of_birth');  
        // Xử lý avatar nếu có
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $extension = $image->getClientOriginalExtension();
            $imageData = base64_encode(file_get_contents($image->getRealPath()));
            $user->profile_pic_url = 'data:image/' . $extension . ';base64,' . $imageData;
        }
        // dd($user->profile_pic_url); 
        // Lưu thông tin vào cơ sở dữ liệu
        $user->save();

        // Trả về lại trang profile với thông báo thành công
        return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công!');
    }

    
  
}