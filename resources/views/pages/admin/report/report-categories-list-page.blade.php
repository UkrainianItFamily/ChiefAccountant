@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="">
                    <a href="#">Панель администратора</a></li>
                <li class="">Отчёты</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Категории отчётов</span>
            <a type="button" class="btn btn-primary" id="openModal">Добавить категорию</a>
        </div>
        <div class="news__wrap">
            <div>
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
            <ul class="list-unstyled" id="mainCategoryList">
                @foreach($categories as $category)
                    <li class="mt-2 list-item">
                        ┣
                            @if(count($category->childrenCategories) > 0 )
                                <input type="checkbox" id>
                            @endif
                        <span style="cursor: pointer" data-id="{{ $category->id }}">{{ $category->name }}</span>
                        <form action="{{ route('admin.deleteReportCategory', $category->id) }}"
                              method="post" onsubmit="return confirm('Удалить категорию?')" class="d-inline mx-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                        <ul class="list-unstyled sub-list d-none">
                            @foreach ($category->childrenCategories as $childCategory)
                                @php $seporator = ''; @endphp
                                @include('layouts.admin.report.report-subcategories-list', ['child_category' => $childCategory, 'seporator' => $seporator])
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="modal-window" id="editWindow">
            <x-modals.admin.report.edit-category :categories="$categories" ></x-modals.admin.report.edit-category>
        </div>
        <div class="modal-window" id="modalWindow">
            <x-modals.admin.report.create-category :categories="$categories" ></x-modals.admin.report.create-category>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/modalWindows.js') }}"></script>
    <script src="{{ asset('js/report/reportCategories.js') }}"></script>
@endsection
