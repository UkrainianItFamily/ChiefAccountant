@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
                <li>Настройка выбора предпринимательской деятельности</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Список названий</span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить запись</button>
        </div>
        <div class="news__wrap">
            <div>

            </div>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center" width="5%">id</th>
                    <th class="text-center" width="20%">Название</th>
                    <th colspan="2" class="text-center" width="10%">Настойки</th>
                </tr>
                @foreach ($data as $entrepreneurialActivity)
                    <tr>
                        <td>{{ $entrepreneurialActivity->id }}</td>
                        <td>{{ $entrepreneurialActivity->name }}</td>

                        <td class="text-center"><a href="{{ route('admin.getEditEntrepreneurialActivity', $entrepreneurialActivity->id) }}" class="text-success"><i class="far fa-edit"></i></a></td>
                        <td class="text-center">    <form action="{{ route('admin.deleteEntrepreneurialActivity', $entrepreneurialActivity->id) }}"
                                  method="post" onsubmit="return confirm('Удалить этот пост?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление новой записи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.saveEntrepreneurialActivity') }}" method="POST">
                    @csrf
                    @method('POST')
                <div class="modal-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label class="col-form-label">Название (ИП, ФОП, ООО и т.д)</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" name="name">
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
@endsection
