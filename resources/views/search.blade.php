@include('layouts.header')
<div class="wrapper-search">
    <div class="filter-search"></div>
    <div class="result-search">
        @if ($resultUsername)
            <div class="friend-search">
                @foreach ($resultUsername as $user)
                    <div class="item-friend">
                        <p class="avatar">
                            <img src="{{ $user->profile_pic_url == null ? asset('images/none-avatar.jpg') : $user->profile_pic_url }}"
                                alt="">
                        </p>
                        <p class="name">
                            {{ $user->username }}
                        </p>
                        <a href="{{ route('friends.add', ['id' => $user->user_id]) }}">
                            <button class="button-add-friend">
                                Thêm bạn bè 
                            </button>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="post-search">
        </div>
    </div>
</div>
</body>

</html>
