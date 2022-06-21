@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="">
                    <a href="#">Панель администратора</a></li>
                <li class="">Отчёты</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Отчёты</span>
            <a type="button" class="btn btn-primary" href="{{ route('admin.getCreateReportPage') }}">Добавить документ</a>
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
                    <th width="10%">Дата создания записи</th>
                    <th width="5%">id</th>
                    <th width="40%">Заголовок</th>
                    <th width="5%">Удалить</th>
                </tr>
                @foreach ($data as $report)
                    <tr>
                        <td>{{ $report['created_at'] }}</td>
                        <td>{{ $report['id'] }}</td>
                        <td class="edit-column">
                            <a class="news__t" href="{{ route('admin.getEditReportPage', $report['slug']) }}">
                                <i class="fas fa-file"></i>
                                <span id="editBtn"
                                      data-id="{{ $report['id'] }}"
                                      data-title="{{ $report['title'] }}"
                                >
                                {{ $report['title'] }}
                            </span>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.deleteReport', $report['id']) }}"
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
