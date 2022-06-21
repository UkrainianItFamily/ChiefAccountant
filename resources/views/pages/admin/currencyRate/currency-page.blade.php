@extends('pages.admin.index')

@section('title')Главбух|Редактирование курса валют @endsection

@section('plugins')
    <link rel='stylesheet' href="{{ asset("libs/select/custom-select.css") }}">
@endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="#">Панель администратора</a></li>
                <li class="">Архив валют</li>
            </ol>
        </nav>
        <div class="title">
            АРХИВ ВАЛЮТ
        </div>
        <div class="arhiv-val__top d-flex justify-content-end">
            <button class="btn btn-primary" id="openModal">Добавить курс валют</button>
        </div>
        <div class="arhiv-val">

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="arhiv__wrap">
                @foreach($dataCurrencys as $currencyRate)
                    <div class="arhiv__item">
                        <div class="arhiv__item__top">{{ $currencyRate['formatDate'] }}</div>
                        <div class="arhiv__item__bot d-flex flex-column align-content-center">
                            <form class="form-today2" method="POST" id="edit-form-{{ $currencyRate['id'] }}" action="{{ route('admin.currencyUpdate', $currencyRate['id']) }}"
                                  onsubmit="return confirm('Внести изменения?')">
                                @method("PATCH")
                                @csrf
                                <input type="date" name="date" value="{{ $currencyRate['date'] }}" hidden>
                                <label for="usd">USD</label>
                                <input class="form-control" step=".001" type="number"
                                       name="usd" id="usd" value="{{ $currencyRate['usd_rate'] }}">
                                <label for="rub">RUB</label>
                                <input class="form-control" step=".001" type="number"
                                       name="rub" id="rub" value="{{ $currencyRate['rub_rate'] }}">
                                <label for="eur">EUR</label>
                                <input class="form-control" step=".001" type="number"
                                       name="eur" id="eur" value="{{ $currencyRate['eur_rate'] }}">
                            </form>
                            <div class="d-flex justify-content-between m-0">
                                <button class="btn btn-primary" form="edit-form-{{ $currencyRate['id'] }}" type="submit">Изменить</button>
                                <form action="{{ route('admin.currencyDestroy', $currencyRate['id']) }}" method="post" onsubmit="return confirm('Подтвердите удаление')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                <div class="modal-window" id="modalWindow">
                    <x-modals.currency-rate.add-currency-rates></x-modals.currency-rate.add-currency-rates>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('libs/select/custom-select.js') }}"></script>
@endsection
