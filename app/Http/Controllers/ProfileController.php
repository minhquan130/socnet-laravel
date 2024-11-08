<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Posts;
use Illuminate\Support\Facades\Hash;
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

         // Lấy tất cả các bài đăng của người dùng hiện tại, sắp xếp từ mới đến cũ
         $posts = Posts::where('user_id', $userCurrent->user_id)->orderBy('created_at', 'desc')->get();

        dd($userCurrent);

        // Truyền cả thông tin người dùng và bài đăng vào view profile
        return view('profile', compact('userCurrent', 'posts'));
        }
    


    public function update(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'username' => 'required|string|max:255',  
            'gender' => 'required|string',
            'date_of_birth' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'relationship' => 'nullable|string|max:255',
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
        $user->address = $request->input('address', $user->address);
        $user->company = $request->input('company', $user->company);
        $user->relationship = $request->input('relationship', $user->relationship);
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