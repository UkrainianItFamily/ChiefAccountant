@extends("pages.admin.index")

@section('title')Glavbuh|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="">
                    <a href="{{ route('admin.getAllNews') }}">Панель администратора</a></li>
                <li class="">Новости</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>новости</span>
            <a type="button" class="btn btn-primary" href="{{ route('admin.newsCreate') }}">Добавить новость</a>
        </div>
        <div class="news__wrap">
            <table class="table table-bordered">
                <tr>
                    <th width="5%">Дата создания публикации</th>
                    <th width="5%">id</th>
                    <th width="40%">Заголовок</th>
                    <th width="5%">Редактировать</th>
                    <th width="5%">Удалить</th>
                </tr>
                @foreach ($data as $news)
                    <tr>
                        <td>{{ $news['created_at'] }}</td>
                        <td>{{ $news['id'] }}</td>
                        <td>
                            <a class="news__t" href="{{ route('admin.getNewsForEdit', $news['slug']) }}">
                                {{ $news['title'] }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.getNewsForEdit', $news['slug']) }}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.newsDestroy', $news['id']) }}"
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
        <div>
            {{$data->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
