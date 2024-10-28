    @include('layouts.header')
    <div class="page-freinds">
        <div class="pf-001">
            <div class="list-options-friend-navbar">
                <a href="{{ route('friends') }}" class="option-friend-navbar"><i class="fa-solid fa-users"></i></i>Kết
                    bạn</a>
                <a href="{{ route('friends.request') }}" class="option-friend-navbar"><i
                        class="fa-solid fa-user-plus"></i>Lời mời kết bạn</a>
            </div>
        </div>

        <div class="pf-002">
            <h3>Những người bạn có thể biết</h3>
            @if ($users == 'request')
                <div class="none-friend">Không có lời mời kết bạn</div>
            @elseif ($users->count() != 0)
                <div class="list-friends">
                    @foreach ($users as $user)
                        <div class="card-friend">
                            <img src="{{ asset('images/avatar.png') }}" alt="">
                            <div class="card-main">
                                <span class="name-friend">{{ $user->username }}</span>
                                <button class="btn-add-friend">
                                    <a href="{{ route('friends.add', ['id' => $user->user_id]) }}">Thêm bạn bè</a>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="none-friend">Không còn bạn bè</div>
            @endif
        </div>
    </div>
    </body>

    </html>
