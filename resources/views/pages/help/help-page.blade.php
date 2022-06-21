@extends('index')

@section('title')Главбух|Домашняя @endsection

@section('plugins')
    <link rel="stylesheet" href="{{ asset('libs/select/custom-select.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datapicker/datepicker.min.css') }}">
@endsection

@section('content')
    <div class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class=""><a href="{{route('index')}}">Главная</a></li>
                <li class="">Помощь</li>
            </ul>
        </nav>
        <h1 class="help-title">Помощь</h1>
        <div class="help-wrap">
            <div class="row">
                <div class="help__left col-xl-9 col-md-8 col-12">
                    <div class="help__content active">
                        <h2>Технические требования</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Регистрация пользователей</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Поисковая система</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Поиск по тематике</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Поиск по ключевым словам</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Поиск по реквезитам</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Новые документы</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Работа со списком документов</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>
                    <div class="help__content">
                        <h2>Регистрация в системе</h2>
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                    </div>



                </div>
                <div class="help__right col-xl-3 col-md-4 col-12">
                    <div class="help__right__group">
                        <div class="help__right__t">ОБЩАЯ ИНФОРМАЦИЯ</div>
                        <div class="help__right__item active">Технические требования</div>
                        <div class="help__right__item">Регистрация в системе</div>
                    </div>
                    <div class="help__right__group">
                        <div class="help__right__t">Поиск в базе данных</div>
                        <div class="help__right__item">Поисковая система</div>
                        <div class="help__right__item">Поиск по тематике</div>
                        <div class="help__right__item">Поиск по ключевым словам</div>
                        <div class="help__right__item">Поиск по реквизитам</div>
                        <div class="help__right__item">Новые документы</div>
                    </div>
                    <div class="help__right__group">
                        <div class="help__right__t">ОБЩАЯ ИНФОРМАЦИЯ</div>
                        <div class="help__right__item">Работа со списком документов</div>
                        <div class="help__right__item">Регистрация в системе</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('./libs/select/custom-select.js') }}"></script>
    <script src="{{ asset('./libs/validate/pristine.min.js') }}"></script>
@endsection
