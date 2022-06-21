@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="">
                    <a href="#">Панель администратора</a></li>
                <li class="">Помощь</li>
                <li class="">Категории</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Категории страницы "Помощь"</span>
            <span type="button" class="btn btn-primary" id="openModal">Добавить категорию</span>
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
            <table class="table table-bordered w-50">
                <tr>
                    <th class="text-center" width="1%">id</th>
                    <th class="text-center" width="20%">Заголовок</th>
                    <th class="text-center" width="5%">Редактировать</th>
                    <th class="text-center" width="5%">Удалить</th>
                </tr>
                @foreach ($data as $category)
                    <tr>
                        <td class="text-center">{{ $category['id'] }}</td>
                        <td class="edit-column"
                            data-id="{{ $category['id'] }}"
                            data-slug="{{ $category['slug'] }}"
                            data-title="{{ $category['title'] }}"
                        >
                            {{ $category['title'] }}
                        </td>
                        <td class="text-center edit-column"
                            data-id="{{ $category['id'] }}"
                            data-slug="{{ $category['slug'] }}"
                            data-title="{{ $category['title'] }}"
                        >
                            <i class="far fa-edit"></i>
                        </td>
                        <td class="text-center">
                            <form action=""
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
            <x-modals.admin.help.create-category></x-modals.admin.help.create-category>
        </div>
        <div class="modal-window" id="editModalWindow">
            <x-modals.admin.help.edit-category></x-modals.admin.help.edit-category>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/modalWindows.js') }}"></script>
@endsection
