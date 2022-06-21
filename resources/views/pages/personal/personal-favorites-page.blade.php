@extends('index')

@section('title'){{ config('app.name') }}|Favorites @endsection

@section('content')
    <div class="profile content-wrap">

        <h1 class="title">Избраное</h1>

        <div class="izbranoe__wrap">
            <div class="izbranoe__item">
                <button type="button" class="remove-izb-item"><i class="fas fa-minus"></i></button>
                <a href="">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</a>
            </div>
            <div class="izbranoe__item">
                <button type="button" class="remove-izb-item"><i class="fas fa-minus"></i></button>
                <a href="">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</a>
            </div>
            <div class="izbranoe__item">
                <button type="button" class="remove-izb-item"><i class="fas fa-minus"></i></button>
                <a href="">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</a>
            </div>
            <div class="izbranoe__item">
                <button type="button" class="remove-izb-item"><i class="fas fa-minus"></i></button>
                <a href="">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/news/axios.js') }}"></script>
@endsection
