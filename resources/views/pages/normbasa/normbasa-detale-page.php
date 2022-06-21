@extends('index')

@section('title')Главбух|Домашняя @endsection

@section('plugins')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" crossorigin="anonymous">
{{--    <link rel='stylesheet' type='text/css' media='screen' href='./libs/bootstrap/bootstrap.min.css'>--}}
{{--    <link rel="stylesheet" href="libs/select/custom-select.css">--}}
{{--    <link rel='stylesheet' type='text/css' media='screen' href='./css/main.min.css'>--}}

    <link rel="stylesheet" href="{{ asset('./libs/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./libs/select/custom-select.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/main.min.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('libs/datapicker/datepicker.min.css') }}">--}}


{{--    <link rel="preconnect" href="https://fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="{{ asset('./libs/bootstrap/bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('./css/main.min.css') }}">--}}
@endsection

@section('content')
    <div class="content-wrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="{{ route('index') }}">Главная</a></li>
{{--                <li class=""><a href="{{ route('report.list') }}">Нормативная база</a></li>--}}
                <li class="">Опубликовано</li>
            </ol>
        </nav>
        <div class="title">ОТЧЕТНОСТЬ</div>
        <div class="otchet__wrap">
            <a href="{{ route('normbasa', ['id'=>1]) }}"><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>
            <a href="{{ route('normbasa', ['id'=>2]) }}"><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>
            <a href="{{ route('normbasa', ['id'=>3]) }}"><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>
            <a href="{{ route('normbasa', ['id'=>4]) }}"><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>--}}
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>--}}
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>--}}
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>--}}
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>--}}
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>--}}
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span> </a>--}}
{{--            <a href=""><i class="fas fa-folder"></i><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></a>--}}
        </div>
    </div>


{{--    <div class="content-wrap">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class=""><a href="#">Главная</a></li>--}}
{{--                <li class="">Опубликовано</li>--}}

{{--            </ol>--}}
{{--        </nav>--}}
{{--        <div class="title">ОТЧЕТНОСТЬ</div>--}}
{{--        <div id="categories" class="column categories jstree jstree-1 jstree-default">--}}
{{--            <ul class="jstree-container-ul jstree-children" >--}}
{{--                <li  class="jstree-node jstree-closed">--}}
{{--                    <i class="jstree-icon jstree-ocl"></i>--}}
{{--                    <a class="jstree-anchor" href="#" >--}}
{{--                        <i class="fas fa-folder"></i>Ноутбуки</a>--}}
{{--                    <ul  class="jstree-children">--}}
{{--                        <li  class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Acer</a></li>--}}
{{--                        <li  class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Lenovo</a></li>--}}
{{--                        <li  class="jstree-node jstree-closed">--}}
{{--                            <i class="jstree-icon jstree-ocl"></i>--}}
{{--                            <a class="jstree-anchor jstree-clicked" href="#"><i class="fas fa-folder"></i>Apple</a>--}}
{{--                            <ul  class="jstree-children">--}}
{{--                                <li   class="jstree-node  jstree-leaf">--}}
{{--                                    <i class="jstree-icon jstree-ocl"></i>--}}
{{--                                    <a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Macbook Air</a></li>--}}
{{--                                <li   class="jstree-node  jstree-leaf jstree-last">--}}
{{--                                    <i class="jstree-icon jstree-ocl"></i>--}}
{{--                                    <a class="jstree-anchor" href="#">--}}
{{--                                        <i class="fas fa-folder"></i>Macbook Pro</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li    class="jstree-node  jstree-leaf jstree-last"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"  id="7_anchor"><i class="fas fa-folder"></i>Sony Vaio</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="jstree-node jstree-closed">--}}
{{--                    <i class="jstree-icon jstree-ocl"></i>--}}
{{--                    <a class="jstree-anchor" href="#">--}}
{{--                        <i class="fas fa-folder"></i>Смартфоны</a>--}}
{{--                    <ul class="jstree-children">--}}
{{--                        <li  class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>iPhone</a></li>--}}
{{--                        <li  class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Samsung</a></li>--}}
{{--                        <li  class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>LG</a></li>--}}
{{--                        <li  class="jstree-node  jstree-leaf jstree-last"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Vertu</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="jstree-node  jstree-last jstree-closed">--}}
{{--                    <i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Комплектующие</a>--}}
{{--                    <ul  class="jstree-children" style="">--}}
{{--                        <li class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Процессоры</a></li>--}}
{{--                        <li class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Память</a></li>--}}
{{--                        <li class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Видеокарты</a></li>--}}
{{--                        <li class="jstree-node  jstree-leaf jstree-last"><i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#"><i class="fas fa-folder"></i>Жесткие диски</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section('scripts')
    <script src="{{ asset('./libs/select/custom-select.js') }}"></script>
    <script src="{{ asset('./libs/validate/pristine.min.js') }}"></script>

    <script src="{{ asset('./libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./js/main.js') }}"></script>

@endsection
