@extends('index')

@section('title')Главбух|Домашняя @endsection

@section('plugins')
    <link rel="stylesheet" href="{{ asset('libs/select/custom-select.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datapicker/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/glide/glide.core.min.css') }}">
@endsection

@section('content')
    <div class="index-page">
        @include('layouts.home.homePage-slider-block')
        <div class="dostup">
            <div class="row">
                <div class="col-xl-6">
                    <div class="dostup__wrap">
                        <span>Получите открытый доступ: </span>
                        <div>
                            <a href="{{ route('help') }}">Тестовый период</a>
                            <a href="{{ route('help') }}">По договору</a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6">
                    <form class="search" action="{{ route('search') }}">
                        @csrf
                        <input
                            type="search"
                            name="search"
                            placeholder="Поиск"
                            required
                            minlength="3"
                            data-pristine-minlength-message="Минимальное количество символов 3"
                        >
                        <button class="btn btn-primary" type="submit">Искать</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="centerrow">
            <div class="row">
                <div class="col-xl-6">
                    @include('layouts.home.homePage-news-block')
                </div>
                <div class="col-xl-6">
                    @include('layouts.home.homePage-calendar-block')
                    @include('layouts.home.homePage-currencyRates-block')
                </div>
            </div>
        </div>
        @include('layouts.home.homePage-links-block')
        @include('layouts.home.homePage-published-block')
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('./libs/select/custom-select.js') }}"></script>
    <script src="{{ asset('./libs/validate/pristine.min.js') }}"></script>
    <script src="{{ asset('./libs/glide/glide.min.js') }}"></script>
@endsection
