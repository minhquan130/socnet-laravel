<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    //
    function index()  {
        $user = Users::where('user_id', Session::get('user_id'))->first();
        return view('profile', compact('user'));
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