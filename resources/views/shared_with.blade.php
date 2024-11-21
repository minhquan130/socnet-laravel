<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Bài viết: {{ $post->content }}</h1>
    <h2>Danh sách người nhận chia sẻ:</h2>
    <ul class="list-group">
        @forelse ($post->shares as $share)
            <li class="list-group-item">
                <strong>Người nhận:</strong> {{ $share->friend->name ?? 'Công khai' }} <br>
                <strong>Người chia sẻ:</strong> {{ $share->user->name }} <br>
                <strong>Chế độ:</strong> {{ ucfirst($share->visibility) }} <br>
                <strong>Thời gian:</strong> {{ $share->created_at->format('d/m/Y H:i') }}
            </li>
        @empty
            <li class="list-group-item">Chưa có ai nhận chia sẻ bài viết này.</li>
        @endforelse
    </ul>
</div>

</body>
</html>



