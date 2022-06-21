@extends('index')

@section('title')Glavbuh|Опубликовано на сайте @endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="content-wrap">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="{{ route('index') }}">Главная</a></li>
                <li class="">Опубликовано</li>

            </ol>
        </nav>

        <div class="title">ОПУБЛИКОВАНО НА САЙТЕ
        </div>

        <div class="news__wrap"></div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-light" data-id=" " id="loadMoreButton">Больше записей</button>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/published/axios.js') }}"></script>
@endsection
