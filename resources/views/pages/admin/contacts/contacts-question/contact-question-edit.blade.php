@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
                <li><a href="{{ route('admin.contacts.question') }}">Тематика вопросов</a></li>
                <li class="">Редактирование</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Редактирование категории</span>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <label  class="form-label">Категория</label>
                        <div class="input-group mb-3">
                            <form action="{{ route('admin.contacts.question.update', $editFeedbackQuestion->id )}}" method="POST" class="w-25">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="{{$editFeedbackQuestion->id}}">
                                <input type="text" class="form-control"  name="title" value="{{$editFeedbackQuestion->title}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <input type="submit" class="btn btn-block btn-outline-success" value="Редактировать">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

