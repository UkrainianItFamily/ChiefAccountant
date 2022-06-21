@extends("pages.admin.index")

@section('title')Главбух|Редактирование ПД @endsection

@section('content')
    <div class="content-wraper">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.getAllNews') }}">Панель администратора</a></li>
                <li><a href="{{ route('admin.getAllEntrepreneurialActivity') }}">Настройка выбора предпринимательской деятельности</a></li>
                <li>Редактирование</li>
            </ul>
        </nav>
        <div class="container-md">
            <h1 class="mt-md-4">Редактирование: </h1>
            <form class="box-form js-validate" method="POST" action="{{ route('admin.updateEntrepreneurialActivity', $entrepreneurialActivity->id) }}">
                @method('PATCH')
                @csrf
                <meta name="csrf-token" id="_token" content="{{ csrf_token() }}">
                <div class="card-body">
                    <div class="form-group p-3 border bg-light">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="id" value="{{ $entrepreneurialActivity->id }}">
                                <label>Название</label>
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $entrepreneurialActivity->name }}"  required>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg mx-auto w-100" onclick="return confirm('Вы уверенны что хотетите обновить данные?');" type="submit">Обновить</button>
            </form>
        </div>
    </div>
@endsection
