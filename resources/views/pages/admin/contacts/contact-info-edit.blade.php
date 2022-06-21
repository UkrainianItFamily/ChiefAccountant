@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.homePage') }}">Панель администратора</a></li>
                <li><a href="{{ route('admin.contacts.getAllFeedbackInfo') }}">Контактная информация</a></li>
                <li>Редактировать контактную информацию</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>Редактировать контактную информацию</span>
        </div>
        <div class="news__wrap">
            <div class="card">
                <div class="card-header"></div>
                    <form action="{{ route('admin.contacts.info.updateFeedbackInfo', $editFeedbackInfo->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                       <input type="hidden" name="feedback_id" value="{{ $editFeedbackInfo->id }}">
                        <div>
                            <textarea rows="15" cols="70" name="description">{{ $editFeedbackInfo->description }}</textarea>
                        </div>
                        <input type="submit" class="btn btn-block btn-outline-success" value="Редактировать">
                    </form>
            </div>
        </div>
@endsection

