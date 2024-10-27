<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instacon</title>
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (nếu cần cho phần khác của trang) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle (bao gồm Popper.js cho modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome JS (nếu cần) -->
    <script src="{{ asset('js/all.min.js') }}"></script>

</head>

<body>
    @include('layouts.header')
    @include('layouts.main')

    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>