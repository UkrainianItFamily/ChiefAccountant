@extends('index')

@section('title'){{ config('app.name') }}|Change Password @endsection

@section('content')
    <div class="profile content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><a href="{{ route('user.personalPage', auth()->user()->id) }}">Личный кабинет</a></li>
                <li>Смена пароля</li>
            </ol>
        </nav>
        <div class="title">Смена пароля</div>
        <div class="profile__section">
            <form action="{{ route('user.update.personalPassword', auth()->user()->id) }}" method="POST" class="profile__form">
                @csrf
                @method('PATCH')
                <div class="profile__section__line">
                    <div class="profile__sec__title">ПАРОЛЬ</div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>СТАРЫЙ ПАРОЛЬ</label>
                            <input type="hidden" name="id" value="{{auth()->user()->id}}">
                            <input type="password" value="" class="form-control" placeholder="старый пароль" name="old_password" >
                        </div>
                        <div class="col-md-4">
                            <label>Новый пароль</label>
                            <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="новый пароль" autocomplete="current-password">
                        </div>
                        <div class="col-md-4">
                            <label>Повтор пароля</label>
                            <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="новый пароль повторно" name="new_password_confirmation"  autocomplete="current-password">
                        </div>
                    </div>
                    <button type="submit">Сохранить</button>
                    <button type="reset">Отменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
