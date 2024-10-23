<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instacon</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="{{ asset('js/all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    @include('layouts.header')
    @include('layouts.main')

    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>