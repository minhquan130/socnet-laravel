@include('layouts.header')

<div class="chats-wrapper">
    <div class="chats">
        <div class="chat-left">
            <h3>Đoạn chat</h3>
            <form action="#" id="form-search-chat">
                <label class="search-chat-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Tìm kiếm đoạn chat">
                </label>
            </form>
            <div class="list-chats">
                <div class="list-chats-wrapper" style="margin-right: 1rem">
                    @foreach ($friends as $friend)
                        <a href="{{ route('chats', ['id' => $friend->groupMembers->group_id]) }}"
                            style="text-decoration: none; color: #000" class="chat-item">
                            <img src="{{ $friend->users->profile_pic_url == null ? asset('images/none-avatar.jpg') : $friend->users->profile_pic_url }}"
                                alt="" class="avatar-chat">
                            <div class="name-friend-chat">{{ $friend->users->username }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="chat-main">
            <div class="header-chat-main">
                <div class="info-friend">
                    <div class="avatar"><img
                            src="{{ $otherUser->profile_pic_url == null ? asset('images/none-avatar.jpg') : $otherUser->profile_pic_url }}"
                            alt=""></div>
                    <div class="name">{{ $otherUser->username }}</div>
                </div>
            </div>

            <div class="chat-messages">
                @foreach ($messages as $message)
                    @if ($message->sender_id == $userCurrent->user_id)
                        <div class="message-user">
                            <p class="message">{{ $message->content }}</p>
                        </div>
                    @else
                        <div class="message-friend">
                            <p class="message">{{ $message->content }}</p>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="chat-bar">
                <i class="fa-solid fa-image"></i>
                <i class="fa-solid fa-face-smile"></i>
                <input type="text" name="chatMessage" id="chat-message">
                <i class="fa-solid fa-paper-plane" id="send-message"></i>
            </div>
        </div>
        <div class="chat-right"></div>
    </div>
</div>

<script src="{{ asset('js/chat.js') }}"></script>
</body>

</html>
