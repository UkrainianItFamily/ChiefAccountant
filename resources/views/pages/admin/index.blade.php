<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset("libs/bootstrap/bootstrap.min.css") }}">
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset("css/main.min.css") }}">
    @yield('plugins')
</head>
<body>
<div class="main">
    <div class="mob-top">
        <div class="burger" id="burger">
            <i class="fas fa-bars burger-open"></i>
            <i class="fas fa-times burger-close"></i>
        </div>
        <div class="mob-top__phone"><a href="">071 330 16 83</a></div>
        <div class="login">
            <a class="" href="">
                <span>Вход</span>
                <img src="{{ asset("./img/user.png") }}">
            </a>
        </div>
    </div>
    <div class="sidebar">
        @include('layouts.admin.sidebar')
    </div>
    <div class="content">
        <div class="top-line">
            <div class="container-fluid">
                <div class="row">
                    Панель администратора
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</div>
<footer class="contact">
    @include('layouts.footer')
</footer>

<script src="{{ asset('libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>
