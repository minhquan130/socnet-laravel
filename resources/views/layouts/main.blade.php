<main>
    @include('components.sidebar')
    @include('components.post')
    <div class="container_navbar">
        <div class="navbar-content">
            <h3 class="title-navbar">Bạn bè</h3>
            <hr>
            <div class="list-friends">
                @if ($friends->isNotEmpty())
                    {{-- @dd($friends) --}}
                    @foreach ($friends as $friend)
                        <div class="item-friend">
                            <div class="pic-avatar-friend">
                                <img src="{{ $friend->users->profile_pic_url == null ? asset('images/none-avatar.jpg') : $friend->users->profile_pic_url }}" alt="">
                            </div>
                            <span>{{ $friend->users->username }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</main>
