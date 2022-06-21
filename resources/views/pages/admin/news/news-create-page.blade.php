@extends("pages.admin.index")

@section('title')Glavbuh|Создание Новости @endsection

@section('plugins')
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset("css/tagin.css") }}">
@endsection

@section('content')
    <div id="app" class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class=""><a href="{{ route('admin.getAllNews') }}">Панель администратора</a></li>
                <li class=""><a href="{{ route('admin.getAllNews') }}">Новости</a></li>
                <li class="">Создание новости</li>
            </ul>
        </nav>
        <div class="container-md">
            <h1 class="mt-md-4">Создание новости</h1>
            <form class="box-form js-validate" method="POST" action="{{ route('admin.newsSave') }}">
                @csrf

                <div class="row justify-content-start">
                    <div class="col-md-8">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="box-form__group">
                    <div class="row flex-lg-wrap">
                        <div class="col-sm-12 col-lg-8">
                            <div class="mx-auto mt-4">
                                <div class="form-group">
                                    <label class="control-label" for="title">Заголовок <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" id="title"
                                           value="{{ old('title') }}"
                                           data-pristine-required-message="Поле должно быть заполнено" required="">
                                </div>
                            </div>
                            <div class="mx-auto mt-4">
                                <div class="form-group">
                                    <label class="control-label" for="description">Краткое описание <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" type="text" name="description" id="description"
                                              data-pristine-required-message="Поле должно быть заполнено" required=""
                                              rows="4">{{ old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="mx-auto mt-4">
                                <div class="form-group">
                                    <label class="control-label" for="text">Детальное описание <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" type="text" name="text" id="text"
                                              data-pristine-required-message="Поле должно быть заполнено" required=""
                                              rows="10">{{ old('text') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 mt-4">
                            <div class="bg-light py-4 px-2 mt-4">
                                <label class="control-label" for="tags">Привязать тэги:</label>
                                <input type="text" name="tags" class="form-control tagin typeahead" id="tags" value="{{ $tags }}">
                            </div>
                            <div class="bg-light py-md-3 px-md-2 mt-4">
                                <div class="">
                                    <button class="btn btn-primary btn-lg mx-auto w-100" type="submit">Отправить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset("js/jquery-3.6.0.min.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="{{ asset("js/tagin.js") }}"></script>
    <script src="{{ asset("ckeditor5/ckeditor.js") }}"></script>
    <script src="{{ asset("ckeditor5/textareaToCkeditor.js") }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="{{ asset("js/app.js") }}"></script>
@endsection
