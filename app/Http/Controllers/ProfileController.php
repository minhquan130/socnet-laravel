<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    //
    function index()  {
        $userCurrent = Users::where('user_id', Session::get('user_id'))->first();

        if ($userCurrent && $userCurrent->date_of_birth) {
            $userCurrent->date_of_birth = date('d/m/Y', strtotime($userCurrent->date_of_birth));
        }
        
        return view('profile', compact('userCurrent'));
    }
        public function update(Request $request){
        $user = auth()->user();

        // Validate input
        $request->validate([
            'user_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'relationship_status' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'gender' => 'nullable|string',
            'date' => 'nullable|date',
        ]);

        // Update user information
        $user->update([
            'name' => $request->input('user_name'),
            'address' => $request->input('address'),
            'company' => $request->input('company'),
            'relationship_status' => $request->input('relationship_status'),
            'bio' => $request->input('bio'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date'),
        ]);

        // Redirect back with success message
        return redirect()->route('profile.index')->with('success', 'Thông tin đã được cập nhật!');
    }


}