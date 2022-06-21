@extends('index')

@section('title')Glavbuh|Registration @endsection

@section('plugins')
    <link rel="stylesheet" href="{{ asset('libs/select/custom-select.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datapicker/datepicker.min.css') }}">
@endsection

@section('content')
    <div class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class=""><a href="{{ route('index') }}">Главная</a></li>
                <li class="">Регистрация
                </li>
            </ul>
        </nav>
        <h1 class="help-title">Регистрация
        </h1>
        <p class="cabinet-text">Пожалуйста, заполните необходимые поля. Если у вас уже есть аккаунт, <a
                href="{{ route('user.loginPage') }}">войдите</a>.</p>
        <div class="log-page">
            <form class="box-form js-validate reg" id="user_reg" method="POST" action="{{ route('user.save') }}">

                @csrf

                <div class="box-form__group">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="name">Имя <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                                       data-pristine-required-message="Поле должно быть заполнено" required title="Разрешено использовать только пробелы и буквы от 2 до 16 символов"
                                       pattern="^[A-Za-zА-Яа-яЁё\s]{2,16}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="surname">Фамилия <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="surname" id="surname"
                                       data-pristine-required-message="Поле должно быть заполнено" value="{{ old('surname') }}"
                                       required title="Разрешено использовать только пробелы и буквы от 2 до 16 символов"
                                       pattern="^[A-Za-zА-Яа-яЁё\s]{2,16}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-mail (будет использован как Логин) <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}"
                               data-pristine-required-message="Поле должно быть заполнено" required="">
                        <p class="help-block">При необходимости вместо e-mail Вы можете использовать Логин, указанный в
                            личном кабинете</p>

                    </div>
                    <div class="form-group pwd-container">
                        <label class="control-label">Пароль <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" id="" value=""
                               data-pristine-required-message="Поле должно быть заполнено" required="" minlength="8">
                        <div class="pwd-container__progress"></div>
                        <div class="pwd-container__info">
                            <p class="help-block pwd-container__text">Длина пароля должна быть минимум 8 символов.</p>
                            <span class="pwd-container__verdict"></span>
                        </div>
                    </div>
                    <div class="checkbox">
                        <input class="slideCheckbox" type="checkbox" id="checkbox2" value="1" name="is_entity"><label
                            for="checkbox2"><span>Я регистрируюсь как юридическое лицо</span></label>
                    </div>
                    <div class="js-usertype" style="display: none;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Название компании</label>
                                    <input class="form-control" type="text" name="company_name" value="{{ old('company_name') }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Телефон </label>
                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Адрес компании</label>
                            <input class="form-control" type="text" name="company_address" value="{{ old('company_address') }}">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">ИНН</label>
                                    <input class="form-control" type="text" name="company_id" value="{{ old('company_id') }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">КПП</label>
                                    <input class="form-control" type="text" name="company_code" value="{{ old('company_code') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-form__group">
                    <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" name="license" id="checkbox1" value="1">
                            <label for="checkbox1"><span>Я прочёл(а) <a href="/license-agreement.fwx"
                                                                        target="_blank">Лицензионное соглашение</a> и согласен(а) с ним.</span></label>
                        </div>
                    </div>
                </div>
                <div class="box-form__group">
                    <div class="row">
                        <div class="col-sm-4">
                            <button class="btn btn-primary btn-lg" type="submit">Регистрация</button>
                        </div>
                        <div class="col-sm-8 log-bot-text">
                            <p>Уже есть аккаунт?<br><a href="{{ route('user.loginPage') }}">Войдите</a></p>
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

