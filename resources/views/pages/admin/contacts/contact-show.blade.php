@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
                <li><a href="{{ route('admin.contacts.getAllFeedbackPage') }}">Обращения</a></li>
                <li>Подробности</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Список обращений</span>
        </div>
        <div class="news__wrap">

            <table class="table table-bordered w-50">
                <tr>
                    <th class="text-center" width="1%">id</th>
                    <th class="text-center" width="20%">Имя</th>
                    <th class="text-center" width="20%">E-mail</th>
                    <th class="text-center" width="20%">Телефон</th>
                    <th class="text-center" width="30%">Тематика вопроса:</th>
                    <th class="text-center" width="60%">Текст</th>
                    <th class="text-center" width="5%">Удалить</th>
                </tr>
                <tr>
                    @foreach($showFeedback as $feedback)
                        <td class="text-center">{{ $feedback['id']}}</td>
                        <td class="text-center">{{ $feedback['name'] }}</td>
                        <td class="edit-column">{{ $feedback['email']}}</td>
                        <td class="text-center edit-column">{{ $feedback['phone'] }}</td>
                        <td>{{ $feedback['title'] }}</td>
                        <td>{{ $feedback['description']}}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.contacts.deleteFeedback', $feedback['id']) }}"
                                  method="POST" onsubmit="return confirm('Удалить это обращение?')">
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
@endsection

