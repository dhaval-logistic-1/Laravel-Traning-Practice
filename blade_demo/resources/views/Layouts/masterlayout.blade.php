<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo - @yield('title', 'website')</title>
</head>

<body>
    <h1>Dhaval Parmar</h1>

    @section('lode')
        <a href="/">Home</a>
        <a href="/post">Post</a>
        <a href="/about">About</a>
    @show

    @hasSection('content')
        @yield('content')
    @else
        <h2>No Content Found</h2>
    @endif

    @stack('script')
</body>

</html>
