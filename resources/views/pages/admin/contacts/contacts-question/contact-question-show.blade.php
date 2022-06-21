@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
            <li><a href="{{ route('admin.contacts.question') }}">Тематика вопросов</a></li>
            <li>Детальный просмотр</li>
        </ol>
    </nav>
    <div class="title d-flex justify-content-between">
        <span>Раздел: Тематика вопроса</span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить подкатегорию</button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Категория</th>
                    <th colspan="3" class="text-center">Другое</th>
                </tr>
                </thead>
                @foreach($showFeedbackQuestion as $category)
                    <tbody>
                    <tr>
                        <th scope="row">{{  $category->id }}</th>
                        <td>{{  $category->title }}</td>
                        <td class="text-center"><a href="{{ route('admin.contacts.question.subcategory.edit', $category->id) }}" class="text-success"><i class="far fa-edit"></i></a></td>
                        <td class="text-center">
                            <form action="{{ route('admin.contacts.question.subcategory.delete', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border-0 bg-transparent">
                                    <i class="far fa-trash-alt text-danger" role="button"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <form action="{{ route('admin.contacts.question.subcategory.create') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить подкатегорию</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Подкатегория</label>
                        </div>
                        <div class="col-auto">
                                @csrf
                                <input type="hidden"  name="parent_category_id" value="{{ $id }}" class="form-control">
                                <input type="text"  name="title" class="form-control">
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script>

@endsection

