<html>

<head>
    <title>App Name - @yield('title')</title>
</head>

<body>
    @section('sidebar')
    <a href="{{route('homePhotos')}}">main</a>
    <a href="{{route('login')}}">login here</a>
    <a href="{{route('register')}}">register here</a>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>

