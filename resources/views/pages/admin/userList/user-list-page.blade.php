@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
                <li>Пользователи</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Список пользователей</span>
        </div>
        <div class="news__wrap">
            <div class="row">
                <div style="padding: 14px">
                    <label for="" style="font-size: 20px; color: #2d2d2d; margin-bottom: 10px;" class="required">Поиск в таблице</label>
                    <form action="{{ route('admin.getUserListPage') }}" method="GET">
                        @csrf
                        <input type="text" name="id" placeholder="поиск по id">
                        <input type="text" name="email" placeholder="Поиск по email">
                        <input type="text" name="phone" placeholder="Поиск по phone">
                        <input style="cursor: pointer" type="submit" name="submit" value="Поиск">
                    </form>
                </div>
            </div>
            <table class="table table-bordered w-50">
                <tr>
                    <th class="text-center" width="1%">id</th>
                    <th class="text-center" width="5%">Email</th>
                    <th class="text-center" width="10%">Телефон</th>
                    <th class="text-center" width="10%">Дата авторизации</th>
                    <th class="text-center" width="10%">Дата изменения</th>
                    <th colspan="3" class="text-center" width="5%">Действие</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td class="text-center"><a href="{{ route('admin.getEditUserPage', $user->id) }}" class="text-success"><i class="far fa-edit"></i></a></td>
                        <td class="text-center">
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border-0 bg-transparent">
                                    <i class="far fa-trash-alt text-danger" role="button"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

