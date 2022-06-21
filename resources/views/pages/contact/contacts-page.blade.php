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
                <li><a href="{{route('index')}}">Главная</a></li>
                <li>Контакты</li>
            </ul>
        </nav>
        <div class="contact-page">
            <h1 class="help-title">Контакты</h1>
            <div class="contact-page__wrap">
                <h2>Контактная информация</h2>
                <p>
                    @foreach($getFeedbackInfo as $info)
                        {{ $info->description }}
                    @endforeach
                </p>
                <h2>Задайте вопрос</h2>
                <p>
                    У Вас есть вопрос по работе с базой данных? Заполните форму и нажмите кнопку <b>Отправить</b>. Мы постараемся ответить максимально быстро.
                </p>

                <form class="contact-page-form" action="{{ route('contacts.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Ваше имя <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="" class="form-control" data-pristine-required-message="Поле должно быть заполнено" required="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">E-mail <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="" class="form-control" data-pristine-required-message="Поле должно быть заполнено" required="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Телефон</label>
                                <input type="text" name="phone" value="" data-pristine-required-message="Поле должно быть заполнено" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Тематика вопроса:</label>
                        <select name="question_topic_id" class="form-control">
                            @foreach ($getCategories as $category)
                                <optgroup  label="{{ $category->title }}">
                                    @foreach ($category->childrenCategories as $childCategory)
                                        <option value="{{ $childCategory->id }}"> {{ $childCategory->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ваше сообщение (вопрос)</label>
                        <textarea class="form-control" name="description" rows="6" data-pristine-required-message="Поле должно быть заполнено" required=""></textarea>
                    </div>

                    <div class="b-well__actions">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
                <div class="contact-susses" id="contact-form-susses" style="display: none;">
                    Спасибо! Ваше сообщение отправлено.

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('./libs/select/custom-select.js') }}"></script>
    <script src="{{ asset('./libs/validate/pristine.min.js') }}"></script>
@endsection
