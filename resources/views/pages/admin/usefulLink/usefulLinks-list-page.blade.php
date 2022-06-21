@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="">
                    <a href="#">Панель администратора</a></li>
                <li class="">Полезные ссылки</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>полезные ссылки</span>
            <span type="button" class="btn btn-primary" id="openModal">Добавить запись</span>
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
            <table class="table table-bordered">
                <tr>
                    <th width="5%">Дата создания записи</th>
                    <th width="5%">id</th>
                    <th width="40%">Заголовок</th>
                    <th width="5%">Редактировать</th>
                    <th width="5%">Удалить</th>
                </tr>
                @foreach ($data as $usefulLink)
                    <tr>
                        <td>{{ $usefulLink['created_at'] }}</td>
                        <td>{{ $usefulLink['id'] }}</td>
                        <td class="edit-column">
                            <span id="editBtn"
                                  data-id="{{ $usefulLink['id'] }}"
                                  data-title="{{ $usefulLink['title'] }}"
                                  data-link="{{ $usefulLink['link'] }}"
                            >
                                {{ $usefulLink['title'] }}
                            </span>
                        </td>
                        <td class="text-center edit-column">
                            <span id="editBtn"
                                  data-id="{{ $usefulLink['id'] }}"
                                  data-title="{{ $usefulLink['title'] }}"
                                  data-link="{{ $usefulLink['link'] }}"
                            >
                                <i class="far fa-edit"></i>
                            </span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.usefulLinkDestroy', $usefulLink['id']) }}"
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
        <div class="modal-window" id="modalWindow">
            <x-modals.admin.useful-link.add-useful-link></x-modals.admin.useful-link.add-useful-link>
        </div>
        <div class="modal-window" id="editModalWindow">
            <x-modals.admin.useful-link.edit-useful-link></x-modals.admin.useful-link.edit-useful-link>
        </div>
        <div>
            {{$data->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/usefulLink/adminEditModal.js') }}"></script>
@endsection
