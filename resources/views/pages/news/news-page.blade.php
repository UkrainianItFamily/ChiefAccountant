@extends('index')

@section('title'){{ $data['title'] }}@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    @if(empty($errors->any()))
        <div class="content-wrap">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ route('index') }}">Главная</a></li>
                    <li class=""><a href="{{ route('news.getAllPage') }}">Новости</a></li>
                </ol>
            </nav>
            <div class="news-d-t">
                <h1>{{ $data['title'] }}</h1>
                <div class="news__data">{{ $data['createdDate'] }}</div>
            </div>
            <div class="news-d-wrap">
                {!! $data['text'] !!}
            </div>
            <div class="news-d-tags">
                Теги:
                <div class="news-d-tags__wrap">
                    @foreach($data['tags'] as $tag)
                        <a href="{{ route('news.getAllNewsByTag', $tag['slug']) }}">{{ $tag['name'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
