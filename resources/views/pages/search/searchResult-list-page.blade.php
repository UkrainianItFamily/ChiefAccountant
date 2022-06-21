@extends('index')

@section('title')Главбух|Результаты поиска @endsection

@section('plugins')
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset("libs/select/custom-select.css") }}">
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset("libs/datapicker/datepicker.min.css") }}">
@endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="{{ route('index') }}">Главная</a></li>
                <li class="">Результаты поиска</li>
            </ol>
        </nav>

        <h1 class="title border-bottom-0">Результаты поиска</h1>

        <div class="news__wrap">
            <div class="">
                <div class="text-secondary px-3">
                    Результаты поиска по запросу: "<span>{{ $request }}</span>"
                </div>
            </div>
            <form class="news__item border-top-0 border-bottom d-flex" action="{{ route('search') }}">
                <input
                    type="search"
                    class="w-75"
                    name="search"
                    placeholder="Поиск"
                    required
                    minlength="3"
                    data-pristine-minlength-message="Минимальное количество символов 3"
                    value="{{ $request }}"
                >
                <button class="btn btn-primary mx-2" type="submit">Искать</button>
            </form>
            @if(count($searchResults) > 0)
                @foreach($searchResults as $result)
                    <div class="news__item">
                        <div class="news__data">{{ $result->formatDate }}</div>
                        <a href="{{ $result->link }}" class="news__t">{{ $result->title }}</a>
                    </div>
                @endforeach
            @else
                <div class="news__item">
                    <div class="news__data">Ничего не найдено</div>
                </div>
            @endif
        </div>
        <div>
            <div class="mx-3">
                {{ $searchResults['pagination']}}
            </div>
        </div>
    </div>
@endsection
