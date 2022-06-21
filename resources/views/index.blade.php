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
    @yield('plugins')
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset("css/main.min.css") }}">
</head>

<body>
<div class="main">
    @include('layouts.burger')
    @include('layouts.sidebar')
    <div class="content">
        <div class="top-line">
            @include('layouts.header')
        </div>

        @if(session('success'))

            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </div>
</div>

<footer class="contact">
    @include('layouts.footer')
</footer>

<script src="{{ asset('libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
@yield('scripts')
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
