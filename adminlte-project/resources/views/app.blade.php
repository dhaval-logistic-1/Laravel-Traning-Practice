<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/assets/scss/app.scss', 'resources/assets/ts/app.ts'])

</head>

<body class=" sidebar-mini  " id="body">
    <div class="app-wrapper">

        @include('components.navbar')
        @include('components.sidebar')

        <main class="app-main">
            @yield('content')
        </main>

        @include('components.footer')
        @include('components.control')


    </div>

</body>
</html>
