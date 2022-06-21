@extends('index')

@section('title')Glavbuh|Авторизация пользователя @endsection

@section('plugins')
    <link rel="stylesheet" href="{{ asset('libs/select/custom-select.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datapicker/datepicker.min.css') }}">
@endsection

@section('content')
    <div class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class=""><a href="{{ route('index') }}">Главная</a></li>
                <li class="">Авторизация пользователя
                </li>
            </ul>
        </nav>
        <h1 class="help-title">Авторизация пользователя
        </h1>
        <div class="log-page">
            <form class="box-form" id="log-form" name="user_login" method="post" action="{{ route('user.auth') }}">
                @csrf
                <input type="hidden" name="prevscript" value="index.fwx">
                <div class="box-form__group">
                    <div class="form-group">
                        <label class="control-label">Логин или Email <span class="text-danger">*</span></label>
                        <input class="form-control input-lg" type="text" name="username" value=""
                               data-pristine-required-message="Поле должно быть заполнено" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Пароль <span class="text-danger">*</span></label>
                        <input class="form-control input-lg" type="password" name="password" value=""
                               data-pristine-required-message="Поле должно быть заполнено" required="">
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-slider--b checkbox-slider--b-weight pull-left">
                            <input id="check" type="checkbox" value="1" name="remember">
                            <label for="check"><span>Запомнить меня</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-form__group">

                    <button type="submit" class="blue-btn btn btn-primary">Вход</button>

                    <div class="row m-t-15">
                        <div class="col-sm-6">
                            <a href="{{ route('forgot-password') }}">Забыли пароль?</a>
                        </div>
                        <div class="col-sm-6 log-bot-text">
                            <p>У Вас еще нет аккаунта? <a href="{{ route('user.registrationPage') }}">Регистрация</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('./libs/select/custom-select.js') }}"></script>
    <script src="{{ asset('./libs/validate/pristine.min.js') }}"></script>
    <script>
        (function () {
            let form = document.getElementById("user_reg");

            let checkbox2 = document.getElementById("checkbox2")
            let jsusertype = document.querySelector('.js-usertype')
            checkbox2.addEventListener('change', function (e) {
                if (checkbox2.checked) {
                    slideDown(jsusertype)
                } else {
                    slideUp(jsusertype)
                }
            });
        })();
    </script>
@endsection

