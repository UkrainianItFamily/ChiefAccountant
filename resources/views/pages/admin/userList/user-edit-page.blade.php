@extends("pages.admin.index")

@section('title')Главбух|Редактирование новости @endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            <strong>{{session('message')}}</strong>
        </div>
    @endif
    <div class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.getAllNews') }}">Панель администратора </a></li>
                <li><a href="{{ route('admin.getUserListPage') }}">Пользователи</a></li>
                <li>Редактирование пользователя</li>
            </ul>
        </nav>
        <div class="container-md">
            <h1 class="mt-md-4">Редактирование пользователя: {{$user->name}}</h1>
            <form class="box-form js-validate" method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                @method('PATCH')
                @csrf
                <meta name="csrf-token" id="_token" content="{{ csrf_token() }}">
            <div class="card-body">
                <div class="form-group p-3 border bg-light">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <label>Новый пароль</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Повтор пароля</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="current-password">
                            </div>
                        </div>
                </div>
                <div class="form-group p-3 border bg-light">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Почтовый адрес</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ $user->email }}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group p-3 border bg-light">
                    <label for="exampleInputPassword1">Назначить пользвателя: <b>{{ $user->name }}</b> администратором?</label>
                    <li>текущий статус: @if($user->is_admin == 1) <b>Админ</b> @else <b>Не админ</b> @endif</li>
                    <select name="is_admin">
                        @if($user->is_admin == 1)
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        @else
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                        @endif
                    </select>
                </div>
                <div class="form-group p-3 border bg-light">
                    <label>Группа пользователя</label>
                    <li>Текущий статус: @if(!is_null($user->date_from) and !is_null($user->date_to) ) <b>Подписанный</b> @else <b>Не подписанный</b> @endif</li>
                    <label>Подписать на период</label>
                    Начало:  <input  type="date" name="date_from"  value="{{$user->date_from}}">
                    Конец:  <input  type="date" name="date_to" value="{{$user->date_to}}">
                </div>
            </div>
                <button class="btn btn-primary btn-lg mx-auto w-100" onclick="return confirm('Вы уверенны что хотетите сохранить данные?');" type="submit">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
