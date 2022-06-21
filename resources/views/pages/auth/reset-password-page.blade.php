@extends('index')

@section('title')Glavbuh|Сброс пароля @endsection

@section('plugins')
    <link rel="stylesheet" href="libs/select/custom-select.css?v=03e27f14a61545d0e0db0778007e1a83">
    <link rel="stylesheet" href="libs/datapicker/datepicker.min.css?v=03e27f14a61545d0e0db0778007e1a83">
@endsection

@section('content')
    <div class="content-wraper">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="#">Главная</a></li>
                <li class="">Календарь бухгалтера</li>

            </ol>
        </nav>

        <h1 class="help-title">Восстановление пароля</h1>
        <div class="log-page">
            <form class="box-form forgot" id="forgot" method="post" action="{{ route('reset-password') }}">
                @csrf
                <input type="hidden" name="token" id="token"
                       value="{{ $token }}">
                <input type="hidden" name="email" id="email"
                       value="{{ $email }}">
                <div class="box-form__group">
                    <div class="form-group">
                        <label class="control-label">Новый пароль<span class="text-danger">*</span></label>
                        <input class="form-control input-lg" type="password" name="password"
                               data-pristine-required-message="Поле должно быть заполнено" value="" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Подтверждение пароля<span class="text-danger">*</span></label>
                        <input class="form-control input-lg" type="password" name="password_confirmation"
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
