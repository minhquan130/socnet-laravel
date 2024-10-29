    @include('layouts.header')
    <div class="page-freinds">
        <div class="pf-001">
            <div class="list-options-friend-navbar">
                <a href="{{ route('friends') }}"
                    class="option-friend-navbar {{ asset('') . 'friends/request' == url()->current() ? '' : 'option-friend-navbar-active' }}"><i
                        class="fa-solid fa-users"></i></i>Kết
                    bạn</a>
                <a href="{{ route('friends.request') }}"
                    class="option-friend-navbar {{ asset('') . 'friends/request' == url()->current() ? 'option-friend-navbar-active' : '' }}"><i
                        class="fa-solid fa-user-plus"></i>Lời mời kết bạn</a>
            </div>
        </div>

        <div class="pf-002">
            @if (asset('') . 'friends/request' == url()->current())
                <h3>Lời mời kết bạn</h3>
            @else
                <h3>Những người bạn có thể biết</h3>
            @endif
            @if ($users == 'request')
                <div class="none-friend">Không có lời mời kết bạn</div>
            @elseif ($users->count() != 0)
                <div class="list-friends">
                    @foreach ($users as $user)
                        <div class="card-friend">
                            <img src="{{ asset('images/ny của quan.jpg') }}" alt="">
                            <div class="card-main">
                                <span class="name-friend">{{ $user->username }}</span>
                                <div class="btn-option-friends">
                                    @if (asset('') . 'friends/request' == url()->current())
                                        <button class="btn-add-friend">
                                            <a href="{{ route('friends.add', ['id' => $user->user_id]) }}">Xác nhận</a>
                                        </button>
                                        <button class="btn-unaccepted-friend">
                                            <a href="{{ route('friends.add', ['id' => $user->user_id]) }}">Xóa</a>
                                        </button>
                                    @else
                                        <button class="btn-add-friend">
                                            <a href="{{ route('friends.add', ['id' => $user->user_id]) }}">Thêm bạn
                                                bè</a>
                                        </button>
                                    @endif
                                </div>
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
