@extends('index')

@section('title')Главбух|Домашняя @endsection

@section('plugins')
    <link rel="stylesheet" href="{{ asset('libs/select/custom-select.css') }}">
@endsection

@section('content')
    <div class="content-wrap">
        <div class="content-wrap">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ route('index') }}">Главная</a></li>
                    <li class=""><a href="{{ route('report.list') }}">Нормативная база</a></li>
                    <li class="">УКАЗЫ
                    </li>

                </ol>
            </nav>

            <div class="title calendar__top2">УКАЗЫ

                <span>
                    <select class="select">
                        <option value="1" selected>Все события</option>
                        <option value="2">Не все события</option>
                        <option value="3">Гос празники</option>
                    </select>
                </span>
            </div>

            <div class="ukaz__wrap">
                <div class="table">
                    <div class="thead">

                        <div>Наименование</div>
                        <div class="filter-thead">Номер
                            <span class="filter-icon">
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                    <i class="fas fa-sort-amount-down"></i>
                                </span>
                        </div>
                        <div class="filter-thead">ДАТА
                            <span class="filter-icon">
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                    <i class="fas fa-sort-amount-down"></i>
                                </span>
                        </div>
                        <div class="filter-thead">Статус
                            <span class="filter-icon">
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                    <i class="fas fa-sort-amount-down"></i>
                                </span>
                        </div>
                        <div class="filter-thead">Дата опубликования
                            <span class="filter-icon">
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                    <i class="fas fa-sort-amount-down"></i>
                                </span>
                        </div>

                    </div>
                    <div class="tbody">

                        <a href="{{ route('normbasa.detail', ['id'=>55555]) }}" class="tr">
                            <div class="ukaz_text-td">
                                <div class="ukaz__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</div>
                                <div class="ukaz__text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

                                </div>
                            </div>
                            <div>
                                297
                            </div>
                            <div>
                                25.08.2020
                            </div>
                            <div>
                                <div class="status">
                                    <span style="background-color: #167bc1;"></span> Действует
                                </div>
                            </div>
                            <div>
                                25.08.2020
                            </div>
                        </a>

{{--                        <a href="" class="tr">--}}
{{--                            <div class="ukaz_text-td">--}}
{{--                                <div class="ukaz__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</div>--}}
{{--                                <div class="ukaz__text">--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                297--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                25.08.2020--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="status">--}}
{{--                                    <span style="background-color: #b24545;"></span> Утратил силу--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                25.08.2020--}}
{{--                            </div>--}}
{{--                        </a>--}}

{{--                        <a href="" class="tr">--}}
{{--                            <div class="ukaz_text-td">--}}
{{--                                <div class="ukaz__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</div>--}}
{{--                                <div class="ukaz__text">--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                297--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                25.08.2020--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="status">--}}
{{--                                    <span style="background-color: #167bc1;"></span> Действует--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                25.08.2020--}}
{{--                            </div>--}}
{{--                        </a>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('./libs/select/custom-select.js') }}"></script>
@endsection
