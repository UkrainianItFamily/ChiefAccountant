@extends('index')

@section('title')Главбух|Архив валют @endsection

@section('plugins')
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset("libs/select/custom-select.css") }}">
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="">Главная</a></li>
                <li class="">Архив валют</li>
            </ol>
        </nav>
        <div class="title">
            АРХИВ ВАЛЮТ
        </div>
        <div class="arhiv-val">
            <div class="arhiv-val__top">
                <div class="arhiv-val__select-wrap">
                    <select class="select" id="year">
                        @foreach($dataDates['years'] as $year)

                            @if($dataDates['currentDate']['year'] == $year)
                                <option selected value="{{ $year }}">{{ $year }}</option>
                            @else
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endif

                        @endforeach
                    </select>
                    <select class="select" id="month">
                        @foreach($dataDates['months'] as $key => $month)

                            @if($dataDates['currentDate']['month'] == $key)
                                <option selected value="{{ $key }}">{{ $month }}</option>
                            @else
                                <option value="{{ $key }}">{{ $month }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="arhiv__wrap"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/currencyRates/axios.js') }}"></script>
    <script src="{{ asset('libs/select/custom-select.js') }}"></script>
@endsection
