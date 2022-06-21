@extends("pages.admin.index")

@section('title')Главбух|Создание отчёта @endsection

@section('content')
    <div class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class=""><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
                <li class=""><a href="{{ route('admin.getAllReports') }}">Список отчётов</a></li>
                <li class="">Создание отчёта</li>
            </ul>
        </nav>
        <div class="container-md">
            <h1 class="mt-md-4">Редактирование отчёта #{{$report->id}}</h1>
            <form class="box-form js-validate" method="POST" action="{{ route('admin.updateReport', $report->slug) }}" id="report-form">
                @method("PATCH")
                @csrf
                <input type="text" name="id" hidden value="{{ $report->id }}">
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
                                    <label class="control-label" for="slug">Слаг <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="slug" id="slug"
                                           value="{{ $report->slug }}"
                                           data-pristine-required-message="Поле должно быть заполнено" required="">
                                </div>
                            </div>
                            <div class="mx-auto mt-4">
                                <div class="form-group">
                                    <label class="control-label" for="title">Заголовок <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" id="title"
                                           value="{{ $report->title }}"
                                           data-pristine-required-message="Поле должно быть заполнено" required="">
                                </div>
                            </div>
                            <div class="mx-auto mt-4">
                                <div class="form-group">
                                    <label class="control-label" for="categoryId">Категория <span
                                            class="text-danger">*</span></label>
                                    <select name="categoryId" id="categoryId" class="form-control" required>
                                        <option value="{{ $report->category->id }}">{{ $report->category->name }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @foreach ($category->childrenCategories as $childCategory)
                                                @php $seporator = ''; @endphp
                                                @include('layouts.admin.report.report-subcategories-options', ['child_category' => $childCategory, 'seporator' => $seporator])
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mx-auto mt-4 pt-2 bg-white">
                                <div class="form-group" >
                                    <span class="control-label">Приложения:</span>
                                    <ul class="list-unstyled" id="apps">
                                        @foreach($report->apps as $app)
                                            <li class="my-2 p-2 appListItem" id="{{ $app->id }}">
                                                <input type="checkbox"
                                                       name="appsIdArray[]"
                                                       value="{{ $app->id }}"
                                                       hidden
                                                       checked
                                                >
                                                <span>{{ $app->title }}</span>
                                                <span class="mx-4" id="deleteApp" style="cursor: pointer;">X</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="">
                                    <span type="button" class="btn btn-primary w-25" id="openAppsWindow">Добавить приложение</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 mt-4">
                            <div class="bg-light py-4 px-2 mt-4">
                                <span>Список редакций</span>
                                <ul id="redactionsList">
                                    @foreach($report->redactions as $redaction)
                                        <li class="appListItem redactionListItem">
                                            <input type="checkbox" name="redactionsIdArray[]" value="{{ $redaction->id}}" hidden checked>
                                            <span>{{ $redaction->date }}</span>
                                            <span class="mx-4" id="deleteRedaction" style="cursor: pointer;">X</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <span type="button" class="btn btn-primary w-100" id="openModal">Добавить</span>
                            </div>
                            <div class="py-md-3 px-md-2 mt-4">
                                <div class="">
                                    <button class="btn btn-primary btn-lg mx-auto w-100" type="submit">Сохранить отчёт
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-window" id="modalWindow">
                <x-modals.admin.report.create-redaction></x-modals.admin.report.create-redaction>
            </div>
            <div style="display: none" id="appsWindow">
                <x-modals.admin.report.add-app></x-modals.admin.report.add-app>
            </div>
            <div style="display: none" id="editRedactionWindow">
                <x-modals.admin.report.edit-redaction></x-modals.admin.report.edit-redaction>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset("ckeditor5/ckeditor.js") }}"></script>
    <script src="{{ asset("ckeditor5/textareaToCkeditor.js") }}"></script>
    <script src="{{ asset('js/modalWindows.js') }}"></script>
    <script src="{{ asset('js/reportRedactions/sendCreateForm.js') }}"></script>
    <script src="{{ asset('js/report/createReport.js') }}"></script>
    <script src="{{ asset('js/report/reportCategories.js') }}"></script>
@endsection
