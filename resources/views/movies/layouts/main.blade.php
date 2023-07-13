<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie | @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="font-roboto">
    @include('sweetalert::alert')
    <x-navbar />
    @yield('content')
    @vite('resources/js/app.js')
    <x-footer />
</body>
</html>