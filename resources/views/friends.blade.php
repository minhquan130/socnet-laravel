    @include('layouts.header')
    <div class="page-freinds">
        <div class="pf-001"></div>

        <div class="pf-002">
            <h3>Kết bạn</h3>
            @if ($users && $users->count() != 0)
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
                <div class="none-friend">Không còn ai</div>
            @endif
        </div>
    </div>
    </body>

    </html>
