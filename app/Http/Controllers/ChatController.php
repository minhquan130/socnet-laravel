<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\GroupMember;
use App\Models\GroupMessage;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

// use Illuminate\Http\Request;

class ChatController extends Controller
{
    function index($id) {
        $currentUserId = Session::get('user_id');
        $userCurrent = Users::where('user_id', $currentUserId)->first();
        
        $friends = (new Friends())->getFriendsByStatus($currentUserId,'accepted');

        $otherUserIds = GroupMember::where('group_id', $id)->where('user_id', '!=', $currentUserId)->pluck('user_id');
        $otherUser = Users::whereIn('user_id', $otherUserIds)->first();

        // dd($otherUsers);
        $messages = GroupMessage::where('group_id', $id)->get();
        // dd($messages);

        return view('chats', compact('userCurrent', 'friends', 'otherUser', 'messages'));
    }

    function store(Request $request, $id) {
        // dd($id);
        $currentUserId = Session::get('user_id');
        $newGroupMessage = new GroupMessage();
        $newGroupMessage->group_id = $id;
        $newGroupMessage->sender_id = $currentUserId;
        $newGroupMessage->content = $request->input('chatMessage');
        $newGroupMessage->save();
        return redirect()->route('chats', ['id' => $id]);
    }
}
