@extends('index')

@section('title'){{ config('app.name') }}|Personal Info @endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/formWrap.css') }}">
    <div class="profile content-wrap">
        <h1 class="title">Ваш профиль</h1>
        <div class="profile__top container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="profile__top1"><b>Информация об открытом доступе</b></div>
                    <div class="profile__top2">Статус: @if(!is_null($getUserById->date_from) and !is_null($getUserById->date_to) ) <b>Есть доступ</b> @else <b>Нет доступа</b> @endif</li></div>
                    <div class="profile__top2">Учетная запись: <b>{{ $getUserById->entrepreneurialActivity->name ?? 'Нет информации!'}}</b></div>
                    @if(is_null($getUserById->date_from) and is_null($getUserById->date_to) ) <div class="profile__top2"><label data-bs-toggle="modal" data-bs-target="#exampleModalContract"><i title="Отправить договор" class="far fa-paper-plane"></i> Отправить договор</label></div>@endif
                    @if(!is_null($getUserById->date_from) and !is_null($getUserById->date_to) )
                    <div class="profile__top2">Номер договора: №<b>{{$getUserById->number_contract}}</b></div>
                    <div class="profile__top2">Действует с: <b>{{\Carbon\Carbon::parse($getUserById->date_from)->format('d.m.Y')}}</b></div>
                    <div class="profile__top2">Действует до: <b>{{\Carbon\Carbon::parse($getUserById->date_to)->format('d.m.Y')}}</b></div>
                    @endif
                </div>
                @if($getUserById->is_admin == 1)
                <div class="col-xl-5 col-md-4 col-12">
                    <div class="profile__top1"><label   data-bs-toggle="modal" data-bs-target="#exampleModalAccess"><i title="Настроить информацию о договоре" class="fas fa-sliders-h"></i></label><b> Дополнительная информация</b></div>
                    @if(!is_null($getUserById->date_from) and !is_null($getUserById->date_to) )
                        <div class="profile__top2">Номер договора: №<b>{{$getUserById->number_contract}}</b></div>
                        <div class="profile__top2">Действует с: <b>{{\Carbon\Carbon::parse($getUserById->date_from)->format('d.m.Y')}}</b></div>
                        <div class="profile__top2">Действует до: <b>{{\Carbon\Carbon::parse($getUserById->date_to)->format('d.m.Y')}}</b></div>
                    @else
                        <div class="profile__top2">Договор отсутствует</div>
                    @endif
                </div>
                @endif
            </div>
        </div>
        <div class="profile__section">
            <form action="{{ route('user.update.personalData', $getUserById->id) }}" method="POST" class="profile__form">
                @csrf
                @method('PATCH')
                <div class="profile__section__line">
                    <div class="profile__sec__title">ПЕРСОНАЛЬНАЯ ИНФОРМАЦИЯ</div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label>Имя</label>
                            <input type="hidden" name="id" value="{{$getUserById->id}}">
                            <input value="{{$getUserById->name}}" placeholder="Имя" name="name" class="@error('name') is-invalid @enderror">
                            <label>Фамилия</label>
                            <input value="{{$getUserById->surname}}" placeholder="Фамилия" name="surname">
                        </div>
                        <div class="col-md-4">
                            <label class="email-triger">E-mail
                                <i class="fas fa-info-circle"></i>
                                <div class="email-triger-info">Электронный адрес редактирует  администрация сайта</div>
                            </label>
                            <input value="{{$getUserById->email}}" disabled="">
                            <label>Телефон</label>
                            <input value="{{$getUserById->phone}}" placeholder="Моб. телефон" name="phone">
                        </div>
                    </div>
                </div>
                <div class="profile__section__line">
                    <div class="profile__sec__title">ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ</div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>УЧЕТНАЯ ЗАПИСЬ</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="entrepreneurial_activity">
                                <option selected value="{{ $getUserById->entrepreneurial_activity_id }}">Откройте это меню выбора</option>
                                @foreach($entrepreneurialActivity as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>НАИМЕНОВАНИЕ</label>
                            <input value="{{$getUserById->company_name}}" name="company_name" placeholder="Название компании">
                        </div>
                        <div class="col-md-4">
                            <label>ИНДЕТИФИКАЦИОННЫЙ КОД</label>
                            <input value="{{$getUserById->company_id}}" name="company_id" placeholder="ID компании">
                        </div>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Отправить</button>
                    <button type="reset" >Отменить</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Подтверждение пароля</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">ПОДТВЕРДИТЕ ПАРОЛЬ:</label>
                                        <input type="password" class="form-control" name="password" placeholder="Подтвеждение паролем" id="recipient-name" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  data-bs-dismiss="modal">Закрыть</button>
                                    <button type="submit">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
            <div class="form-row text-center">
                <div class="col-12">
                    <a href="{{ route('user.editPasswordPage', auth()->user()->id) }}" class="btn btn-outline-secondary btn-sm text-center">Смена пароля <i class="fas fa-key"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalContract" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Форма отправки договора</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.sendContractToEmail', $getUserById->id) }}" class="profile__form__one" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{$getUserById->id}}">
                            <label for="formFile" class="form-label">Прикрепить файл<span class="text-danger">*</span> (.docx .pdf)</label>
                            <input class="form-control" name="upload" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label class="profile__top2">Текствое сообщение<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalAccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Форма настройки договора</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.updateAccessPersonal', $getUserById->id) }}" class="profile__form__one" method="POST">
                    @csrf
                    @method('PATCH')
                      <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{$getUserById->id}}">
                            <label class="profile__top2">Номер договора</label>
                            <input type="text" class="form-control" name="number_contract" value="{{$getUserById->number_contract}}">
                        </div>
                        <div class="mb-3">
                            <label class="profile__top2">Начало:</label>
                            <input  type="date" class="form-control" name="date_from"  value="{{$getUserById->date_from}}">
                        </div>
                        <div class="mb-3">
                            <label class="profile__top2">Конец:</label>
                            <input  type="date" class="form-control"  name="date_to" value="{{$getUserById->date_to}}">
                        </div>
                      </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                     <button type="submit" class="btn btn-primary">Сохранить</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
@endsection

