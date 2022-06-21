@extends('index')

@section('title')Glavbuh|Восстановление пароля @endsection

@section('plugins')
    <link rel="stylesheet" href="libs/select/custom-select.css?v=03e27f14a61545d0e0db0778007e1a83">
    <link rel="stylesheet" href="libs/datapicker/datepicker.min.css?v=03e27f14a61545d0e0db0778007e1a83">
@endsection

@section('content')
    <div class="content-wraper">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="#">Главная</a></li>
                <li class=""><a href="#">Восстановление пароля</a></li>
            </ol>
        </nav>

        <h1 class="help-title">Восстановление пароля</h1>
        <div class="log-page">
            @if(session('success'))
                <div class="contact-susses" style="display: block;">
                    Код востановления пароля отправлен на почту
                </div>
            @endif
            <form class="box-form forgot" id="forgot" method="post" action="{{ route('forgot-password-link') }}">
                @csrf
                <div class="box-form__group">
                    <p class="help-block">Пожалуйста, введите ваш email, который был указан при регистрации и мы вышлем
                        вам
                        логин и пароль.</p>
                    <div class="form-group">
                        <label class="control-label">E-mail<span class="text-danger">*</span></label>
                        <input class="form-control input-lg" type="text" name="username"
                               data-pristine-required-message="Поле должно быть заполнено" value="" required="">
                    </div>
                </div>
                <div class="box-form__group">
                    <button type="submit" name="loginbtn" class="btn btn-primary btn-lg btn-block">Отправить</button>

                    <div class="row m-t-15">
                        <div class="col-sm-6">
                            <a href="{{ route('user.loginPage') }}">Вход</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p><a href="{{ route('user.registrationPage') }}">Регистрация</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="./libs/bootstrap/bootstrap.bundle.min.js?v=03e27f14a61545d0e0db0778007e1a83"></script>
    <script src="./libs/select/custom-select.js?v=03e27f14a61545d0e0db0778007e1a83"></script>
    <script src="./libs/validate/pristine.min.js?v=03e27f14a61545d0e0db0778007e1a83"></script>
@endsection
