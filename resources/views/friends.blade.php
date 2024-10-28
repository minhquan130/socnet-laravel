    @include('layouts.header')
    <div class="page-freinds">
        <div class="pf-001"></div>

        <div class="pf-002">
            <h3>Kết bạn</h3>
            <div class="list-friends">
                @if ($users)
                    @foreach ($users as $user)
                        <div class="card-friend">
                            <img src="{{ asset('images/avatar.png') }}" alt="">
                            <div class="card-main">
                                <span class="name-friend">{{ $user->username }}</span>
                                <button class="btn-add-friend">Thêm bạn bè</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </body>

    </html>
