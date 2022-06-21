@extends('index')

@section('title')Главбух|Отчётность @endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class=""><a href="#">Главная</a></li>
            <li class=""><a href="#">Нормативная база</a></li>
            <li class="">УКАЗЫ</li>
        </ol>
    </nav>

    <div class="otchet-d__wrap">
        @include('layouts.report.sidebar')
        <div class="otchet-d__right">
            <div class="otchet__item active" id="item1">
                <div class="otchet__tree2">
                </div>
                <div class="otchet__wrap detailItem"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/report/report.js') }}"></script>
    <script src="{{ asset('js/report/lightbox/fslightbox.js') }}"></script>
@endsection

