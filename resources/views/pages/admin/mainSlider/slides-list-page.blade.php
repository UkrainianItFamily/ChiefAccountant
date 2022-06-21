@extends("pages.admin.index")

@section('title')Главбух|Администратор @endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="">
                    <a href="#">Панель администратора</a></li>
                <li class="">Главный слайдер</li>
            </ol>
        </nav>
        <div class="title d-flex justify-content-between">
            <span>слайды</span>
            <span type="button" class="btn btn-primary" id="openModal">Добавить слайд</span>
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
                    <th width="5%">Дата доабвления слайда</th>
                    <th width="5%">id</th>
                    <th width="40%">Заголовок</th>
                    <th width="5%">Позиция в очереди</th>
                    <th width="5%">Редактировать</th>
                    <th width="5%">Удалить</th>
                </tr>
                @foreach ($slidesList as $slide)
                    <tr>
                        <td>{{ $slide['created_at'] }}</td>
                        <td>{{ $slide['id'] }}</td>
                        <td class="edit-column">
                            <span id="editBtn"
                                  data-id="{{ $slide['id'] }}"
                                  data-title="{{ $slide['title'] }}"
                                  data-link="{{ $slide['link'] }}"
                            >
                                {{ $slide['title'] }}
                            </span>
                        </td>
                        <td>
                            @if($slide['position'] == 0)
                                <span>Cкрыт</span>
                            @else
                                <span>{{ $slide['position'] }}</span>
                            @endif
                        </td>
                        <td class="text-center edit-column">
                            <span id="editBtn"
                                  data-id="{{ $slide['id'] }}"
                                  data-title="{{ $slide['title'] }}"
                                  data-link="{{ $slide['link'] }}"
                                  data-position="{{ $slide['position'] }}"
                                  data-description="{{ $slide['description'] }}"
                            >
                                <i class="far fa-edit"></i>
                            </span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.mainSliderDeleteSlide', $slide['id']) }}"
                                  method="post" onsubmit="return confirm('Удалить этот слайд?')">
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
            <x-modals.admin.main-slider.add-slide></x-modals.admin.main-slider.add-slide>
        </div>
        <div class="modal-window" id="editModalWindow">
            <x-modals.admin.main-slider.edit-slide></x-modals.admin.main-slider.edit-slide>
        </div>
        <div>
            {{$slidesList->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/mainSlider/adminEditModal.js') }}"></script>
@endsection
