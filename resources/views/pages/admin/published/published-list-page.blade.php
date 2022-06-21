@extends("pages.admin.index")

@section('title')Glavbuh|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="">
                    <a href="{{ route('admin.getAllNews') }}">Панель администратора</a></li>
                <li class="">Опубликовано на сайте</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>опубликовано на сайте</span>
            <a type="button" class="btn btn-primary" href="{{ route('admin.publicationCreate') }}" id="addBtn">Добавить запись</a>
        </div>
        <div class="news__wrap">
            <div class="row justify-content-start mt-md-1 px-2">
                <div class="col-12">

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
            <div class="d-flex">
                <div class="py-3 px-4">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"> Выбрать все загруженные записи</label>
                </div>
                <button class="m-0 p-0 border-0 bg-transparent p-3" id="delCheckedBtn">
                    <i class="far fa-trash-alt text-danger deleteBtn" ></i>
                </button>
            </div>
            <div class="news__item">

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-light" data-id=" " id="loadMoreButton">Больше новостей</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/published/adminAxios.js') }}"></script>
@endsection

