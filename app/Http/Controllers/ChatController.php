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
    function index($id)
    {
        $currentUserId = Session::get('user_id');
        $userCurrent = Users::where('user_id', $currentUserId)->first();
        $friends = Friends::getFriendsByStatus($currentUserId, 'accepted');
        // dd($friends);
        foreach ($friends as $friend) {
            $friend->groupMembers = GroupMember::whereIn('user_id', [$currentUserId, $friend->users->user_id])
                ->select('group_id')
                ->groupBy('group_id')
                ->havingRaw('COUNT(DISTINCT user_id) = 2')
                ->get();
        }
        $otherUser = null;
        $messages = null;
        if (GroupMember::where('group_id', $id)->where('user_id', $currentUserId)->first()) {
            # code...
            $otherUserIds = GroupMember::where('group_id', $id)->where('user_id', '!=', $currentUserId)->pluck('user_id');
            $otherUser = Users::whereIn('user_id', $otherUserIds)->first();

            // dd($otherUsers);
            $messages = GroupMessage::where('group_id', $id)->get();
            // dd($messages);

        }
        return view('chats', compact('userCurrent', 'friends', 'otherUser', 'messages'));
        // return redirect()->route('home');
    }

    function store(Request $request, $id)
    {
        // dd($id);
        // dd($request->input('chatMessage'));
        $currentUserId = Session::get('user_id');
        $newGroupMessage = new GroupMessage();
        $newGroupMessage->group_id = $id;
        $newGroupMessage->sender_id = $currentUserId;
        $newGroupMessage->content = $request->input('chatMessage');
        $newGroupMessage->save();
        // return redirect()->route('chats', ['id' => $id]);
        return response()->json([
            'message' => $newGroupMessage,
            'currentUserId' => $currentUserId
        ]);
    }
}
