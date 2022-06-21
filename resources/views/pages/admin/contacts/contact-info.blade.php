@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
                <li class="">Контактная информация</li>
            </ol>
        </nav>
            <div class="title d-flex justify-content-between">
                <span>Контактная информация</span>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Добавить контакт
                </button>
            </div>
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        @foreach($getAllFeedbackInfo as $info)
                        <blockquote class="blockquote mb-0">
                            <p class="card-text">{{ $info->description }}</p>
                            <div class="btn-group">
                            <a href="{{ route('admin.contacts.info.editFeedbackInfo', $info->id) }}" class="btn btn-outline-primary">Редактировать</a>
                            <form action="{{ route('admin.contacts.info.deleteFeedbackInfo', $info->id) }}"
                                  method="POST" onsubmit="return confirm('Удалить контакт?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Удалить</button>
                            </form>
                            </div>
                        </blockquote>
                        @endforeach
                    </div>
                </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content">
                    <form action="{{ route('admin.contacts.info.createFeedbackInfo') }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавить контактную информацию</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="control-label" for="text">Детальное описание <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <textarea class="form-control" rows="15" cols="45" type="text" name="description"> </textarea>
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

