@include('layouts.header')
<div class="profile">
    <div class="profile-left">
        @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
        <div class="info-card">
            <div class="info-head">
                <h4><i class="fa-solid fa-user"></i> Thông tin người dùng</h4>
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="z-index: 10">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
            <div class="info">
                <span>
                    <b><i class="fa-solid fa-location-dot"></i> Địa chỉ: </b>
                </span>
                <span>{{ $userCurrent->address ?? 'Chưa cập nhật' }}</span>
            </div>
            <div class="info">
                <span>
                    <b><i class="fa-solid fa-building"></i> Làm việc ở: </b>
                    <span>{{ $userCurrent->company ?? 'Chưa cập nhật' }}</span>
                </span>
            </div>
            <div class="info">
                <span>
                    <b><i class="fa-solid fa-heart"></i> Tình trạng: </b>
                    <span>{{ $userCurrent->relationship ?? 'Chưa cập nhật' }}</span>
                </span>
            </div>
            <div class="info">
                <span>
                    <b><i class="fa-solid fa-venus-mars"></i> Giới tính: </b>
                    <span>
                        @php
                            if ($userCurrent->gender == 'male') {
                                echo 'Nam';
                            } elseif ($userCurrent->gender == 'female') {
                                echo 'Nữ';
                            } elseif ($userCurrent->gender == 'other') {
                                echo 'Khác';
                            } else {
                                echo 'Chưa cập nhật';
                            };
                        @endphp
                    </span>
                </span>
            </div>
            <div class="info">
                <span>
                    <b><i class="fa-solid fa-cake-candles"></i> Ngày sinh: </b>
                    <span>{{ $userCurrent->date_of_birth ?? 'Chưa cập nhật' }}</span>
                </span>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa thông tin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @if (session('updatedUser'))
                        @php
                            $userCurrent = session('updatedUser');
                        @endphp
                    @endif
                    <div class="modal-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                            id="profileUpdateForm">
                            @csrf
                            <div class="edit">
                                <label class="edit-avatar">
                                    <img src="{{ $userCurrent->profile_pic_url ?? asset('images/none-avatar.jpg') }}"
                                        alt="">
                                    <input type="file" name="avatar" id="avatar" accept="image/*"
                                        style="display: none">
                                </label>
                                <div class="edit-name">
                                    <span>Tên người dùng</span>
                                    <input type="text" name="username" id="name" placeholder="Nhập tên của bạn"
                                        value="{{ old('username', $userCurrent->username) }}">
                                </div>
                                <div class="edit-address">
                                    <span>Địa chỉ</span>
                                    <input type="text" name="address" id="address" placeholder="Nhập địa chỉ"
                                        value="{{ old('address', $userCurrent->address) }}">
                                </div>
                                <div class="edit-company">
                                    <span>Làm việc ở</span>
                                    <input type="text" name="company" id="company" placeholder="Nhập tên công ty"
                                        value="{{ old('company', $userCurrent->company) }}">
                                </div>
                                <div class="edit-relationship">
                                    <span>Tình trạng</span>
                                    <input type="text" name="relationship" id="relationship"
                                        placeholder="Nhập tình trạng mối quan hệ"
                                        value="{{ old('relationship', $userCurrent->relationship) }}">
                                </div>
                                {{-- @dd($userCurrent) --}}
                                <div class="edit-gender">
                                    <span>Giới tính</span>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male" {{ $userCurrent->gender == 'male' ? 'selected' : '' }}>
                                            Nam</option>
                                        <option value="female"
                                            {{ $userCurrent->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                                        <option value="other" {{ $userCurrent->gender == 'other' ? 'selected' : '' }}>
                                            Giới tính khác</option>
                                    </select>
                                </div>
                                <div class="edit-date">
                                    <span>Ngày sinh</span>
                                    {{-- @dd(date('Y-m-d', strtotime(str_replace('/', '-', $userCurrent->date_of_birth)))) --}}
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                        value="{{ date('Y-m-d', strtotime(str_replace('/', '-', $userCurrent->date_of_birth))) }}">


                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-container">
        <div class="profile-right">
            <div class="avatar">
                <img src="{{ $userCurrent->profile_pic_url ?? asset('images/none-avatar.jpg') }}" alt="">
            </div>
            <div class="info-right">
                <h2>{{ $userCurrent->username }}</h2>
                <div class="user-post-follow">
                    <span class="post">0 Bài viết</span>
                    <span class="follower">300 Người theo dõi</span>
                    <span class="following">50000 Đang theo dõi</span>
                </div>
            </div>
        </div>
        <div class="story">
            <div class="list-story">
                <img src="{{ asset('images/background.jpg') }}" alt="">
                <span>Hello world</span>
            </div>
            <div class="list-story">
                <img src="{{ asset('images/avatar.png') }}" alt="">
                <span>Love</span>
            </div>
            <div class="list-story">
                <img src="{{ asset('images/background.jpg') }}" alt="">
                <span>meo meo</span>
            </div>
            <div class="list-story">
                <img src="{{ asset('images/avatar.png') }}" alt="">
                <span>work</span>
            </div>
            <div class="list-story">
                <img src="{{ asset('images/background.jpg') }}" alt="">
                <span>boring</span>
            </div>
        </div>
        <div class="posts-container" style="width: 60%">
            <div class="list-posts">
                @if ($posts->isEmpty())
                    <p>Không có bài đăng nào.</p>
                @else
                    @foreach ($posts as $post)
                        <div class="post-item">
                            <div class="top-post">
                                <div class="top-post-tp1">
                                    <div class="avarta-post">
                                        <img src="{{ $post->profile_pic_url == null ? asset('images/none-avatar.jpg') : $post->profile_pic_url }}"
                                            alt="">
                                    </div>
                                    <div class="content-top-post">
                                        <span class="name">{{ $post->username }}</span>
                                        <span class="posted-time">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="top-post-tp2">
                                    <div class="other-post">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </div>
                                    <ul class="options-item-post">
                                        <li><a href="{{ route('post.delete', ['id' => $post->post_id]) }}"><i
                                                    class="fa-solid fa-trash"></i>Xóa bài viết</a></li>
                                        <li data-bs-toggle="modal"
                                            data-bs-target="#updatePostModal{{ $post->post_id }}">
                                            <i class="fa-solid fa-pen"></i>Sửa bài viết
                                        </li>
                                    </ul>
                                </div>

                                <!-- Modal of chỉnh sửa bài biết  -->
                                <!-- Modal -->
                                <div class="modal fade" id="updatePostModal{{ $post->post_id }}" tabindex="-1"
                                    aria-labelledby="updatePostModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="updatePostModalLabel">Sửa bài viết
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('post.edit', ['id' => $post->post_id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <span class="name">{{ $post->username }}</span>

                                                    <!-- Nội dung bài viết -->
                                                    <textarea name="input-content" class="form-control">{{ $post->content }}</textarea>

                                                    <!-- Hiển thị ảnh hiện tại nếu có -->
                                                    @if ($post->media_url)
                                                        <div class="current-image my-3">
                                                            <label>Ảnh hiện tại:</label>
                                                            <img src="{{ $post->media_url }}" alt="Ảnh hiện tại"
                                                                style="width: 100%; max-height: 200px; object-fit: cover;">
                                                        </div>
                                                    @endif

                                                    <!-- Input để tải ảnh mới -->
                                                    <div class="mt-3">
                                                        <label for="input-picture" class="form-label">Chọn ảnh mới
                                                            (nếu muốn thay
                                                            đổi)
                                                        </label>
                                                        <input type="file" name="input-picture"
                                                            class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal -->

                            </div>
                            <div class="content-post">
                                <div class="content-text">
                                    {{ $post->content }}
                                </div>
                                @if ($post->media_url)
                                    <div class="content-media">
                                        <img src="{{ $post->media_url }}" alt="Hình ảnh bài viết">
                                    </div>
                                @endif
                            </div>
                            <hr>
                            <div class="metrics-post">
                                <div class="count-likes">
                                    <span class="icon-count-likes">
                                        <i class="fa-solid fa-heart"></i>
                                    </span>
                                    @php
                                        $likesModel = new \App\Models\Likes();
                                        $countLike = $likesModel->getCountLikeById($post->post_id);
                                    @endphp
                                    <span id="qty-likes-post-{{ $post->post_id }}">
                                        {{ $countLike }}
                                    </span>
                                </div>
                                <div class="count-comments">
                                    @php
                                        $commentsModel = new \App\Models\Comments();
                                        $countComments = $commentsModel->getCountCommentByPostId($post->post_id);
                                    @endphp
                                    <a class="option option-comment" data-bs-toggle="modal"
                                        data-bs-target="#commentModal{{ $post->post_id }}">
                                        <span id="qty-comments-post-{{ $post->post_id }}">{{ $countComments }} bình
                                            luận</span>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="options-post">
                                <button class="option option-like like-btn btn-like-post-{{ $post->post_id }}"
                                    data-id="{{ $post->post_id }}"
                                    style="background: none; border: none; color: {{ $likesModel->isLiked($post->post_id) ? '#ff7e7e' : '#000' }}">
                                    <span class="option-icon icon-like">
                                        <i class="fa-solid fa-heart"></i>
                                    </span>
                                    <span>Thích</span>
                                </button>
                                <div class="option option-comment" data-bs-toggle="modal"
                                    data-bs-target="#commentModal{{ $post->post_id }}">
                                    <span class="option-icon icon-comment">
                                        <i class="fa-solid fa-message"></i>
                                    </span>
                                    <span>Bình luận</span>
                                </div>
                                {{-- <div class="option option-coppy">
                            <span class="option-icon icon-coppy">
                                <i class="fa-solid fa-link"></i>
                            </span>
                            <span>Sao chép</span>
                        </div> --}}
                                <div class="option option-share">
                                    <span class="option-icon icon-share">
                                        <i class="fa-solid fa-share"></i>
                                    </span>
                                    <span>Chia sẻ</span>
                                </div>
                            </div>
                        </div>
                        <!-- Modal comment-->
                        <div class="modal fade" id="commentModal{{ $post->post_id }}" tabindex="-1"
                            aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel">Bình luận</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="commentsList-post-{{ $post->post_id }}">
                                        @php
                                            $newComment = new \App\Models\Comments();
                                            $comments = $newComment->getAllCommentByPostId($post->post_id);

                                            // dd($comments);

                                        @endphp
                                        @foreach ($comments as $comment)
                                            <div class="item-comment">
                                                <img src="{{ $comment->profile_pic_url == null ? asset('images/none-avatar.jpg') : $comment->profile_pic_url }}"
                                                    alt="Avatar" class="img-fluid rounded-circle"
                                                    style="width: 40px; height: 40px; object-fit: cover;">
                                                <div class="content-comment">
                                                    <p class="username-comment">{{ $comment->username }}</p>
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="commentForm{{ $post->post_id }}" class="text-comment"
                                        data-post-id="{{ $post->post_id }}">
                                        @csrf
                                        <img src="{{ $userCurrent->profile_pic_url == null ? asset('images/none-avatar.jpg') : $userCurrent->profile_pic_url }}"
                                            alt="Avatar" class="img-fluid rounded-circle me-2"
                                            style="width: 40px; height: 40px;">
                                        <input type="text" name="comment" id="input-comment"
                                            placeholder=" Bình luận..." style="width: 100%; height:30px;">
                                        <input type="hidden" name="post-id" value="{{ $post->post_id }}">
                                        <button type="button" class="submit-comment">➤</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            @endif
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const defaultAvatar = "{{ asset('images/none-avatar.jpg') }}"; // Tạo biến chứa đường dẫn đến ảnh mặc định
    // Thay đổi ảnh trong modal khi chọn ảnh mới
    document.getElementById('avatar').onchange = function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            document.querySelector('.edit-avatar img').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    @if (session('success'))
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 1000);
    @endif
</script>
<script src="{{ asset('js/home.js') }}"></script>
</body>

</html>
