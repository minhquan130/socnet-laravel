@include('layouts.header')
<div class="profile">
    <div class="profile-left">
        @if(session('success'))
            <div class="alert alert-success">
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
                        <span>{{ $userCurrent->gender ?? 'Chưa cập nhật' }}</span>
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
                    <div class="modal-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profileUpdateForm">
                            @csrf
                            <div class="edit">
                                <label class="edit-avatar">
                                    <img src="{{ $userCurrent->profile_pic_url ?? asset('images/none-avatar.jpg') }}" alt="">
                                    <input type="file" name="avatar" id="avatar" accept="image/*" style="display: none">
                                </label>
                                <div class="edit-name">
                                    <span>Tên người dùng</span>
                                    <input type="text" name="username" id="name" placeholder="Nhập tên của bạn" value="{{ old('username', $userCurrent->username) }}">
                                </div>
                                <div class="edit-address">
                                    <span>Địa chỉ</span>
                                    <input type="text" name="address" id="address" placeholder="Nhập địa chỉ" value="{{ old('address', $userCurrent->address) }}">
                                </div>
                                <div class="edit-company">
                                    <span>Làm việc ở</span>
                                    <input type="text" name="company" id="company" placeholder="Nhập tên công ty" value="{{ old('company', $userCurrent->company) }}">
                                </div>
                                <div class="edit-relationship">
                                    <span>Tình trạng</span>
                                    <input type="text" name="relationship" id="relationship" placeholder="Nhập tình trạng mối quan hệ" value="{{ old('relationship', $userCurrent->relationship) }}">
                                </div>
                                <div class="edit-gender">
                                    <span>Giới tính</span>
                                    <select name="gender" id="gender">
                                        <option value="male" {{ $userCurrent->gender == "male" ? 'selected' : '' }}>Nam</option>
                                        <option value="female" {{ $userCurrent->gender == "female" ? 'selected' : '' }}>Nữ</option>
                                        <option value="other" {{ $userCurrent->gender == "other" ? 'selected' : '' }}>Giới tính khác</option>
                                    </select>
                                </div>
                                <div class="edit-date">
                                    <span>Ngày sinh</span>
                                    {{-- @dd(date('Y-m-d', strtotime(str_replace('/', '-', $userCurrent->date_of_birth)))) --}}
                                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ date('Y-m-d', strtotime(str_replace('/', '-', $userCurrent->date_of_birth))) }}">


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
        
        
    </div>
</div>
<script>
    // Thay đổi ảnh trong modal khi chọn ảnh mới
    document.getElementById('avatar').onchange = function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            document.querySelector('.edit-avatar img').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
</body>
</html>
