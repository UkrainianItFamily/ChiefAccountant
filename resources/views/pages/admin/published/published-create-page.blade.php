@extends("pages.admin.index")

@section('title')Glavbuh @endsection

@section('content')
    <div class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class=""><a href="{{ route('admin.getAllNews') }}">Панель администратора</a></li>
                <li class=""><a href="{{ route('admin.getAllPublishes') }}">Опубликовано на сайте</a></li>
                <li class="">Создание ссылки на публикацию</li>
            </ul>
        </nav>
        <div class="container-md">
            <h1 class="mt-md-4">Создание ссылки на публикацию</h1>
            <form class="box-form js-validate" method="POST" action="{{ route('admin.publicationSave') }}">
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
                                    <label class="control-label" for="description">Краткое описание <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" type="text" name="description" id="description"
                                              data-pristine-required-message="Поле должно быть заполнено" required=""
                                              rows="4">{{ old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="mx-auto mt-4">
                                <div class="form-group">
                                    <label class="control-label" for="link">Ссылка <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" type="text" name="link" id="link"
                                              data-pristine-required-message="Поле должно быть заполнено" required=""
                                              rows="10">{{ old('link') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 mt-4">
                            <div class="bg-light py-4 px-2 mt-4">
                                <label class="control-label" for="date">Дата:</label>
                                <input type="date" id="date" name="date"
                                       value=""
                                       min="2021-01-01" max="2025-12-31">
                            </div>
                            <div class="bg-light py-md-3 px-md-2 mt-4">
                                <div class="">
                                    <button class="btn btn-primary btn-lg mx-auto w-100" type="submit">Отправить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
