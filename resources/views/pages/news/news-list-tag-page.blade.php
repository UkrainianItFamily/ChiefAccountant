@extends('index')

@section('title')Glavbuh|News @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="{{ route('index') }}">Главная</a></li>
                <li class="">Новости</li>
            </ol>
        </nav>
        <div class="title">НОВОСТИ</div>
        <div class="news__wrap"></div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-light" data-id=" " id="loadMoreButton">Больше новостей</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/news/axios-tag.js') }}"></script>
@endsection
