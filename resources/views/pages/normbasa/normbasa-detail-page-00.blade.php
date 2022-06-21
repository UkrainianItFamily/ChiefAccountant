@extends('index')

@section('title')Главбух|Домашняя @endsection

@section('plugins')
    <link rel="stylesheet" href="{{ asset('libs/select/custom-select.css') }}">
@endsection

@section('content')
    <div class="content-wraper">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class=""><a href="#">Главная</a></li>
                <li class=""><a href="{{ route('report.list') }}">Нормативная база</a></li>
                <li class="">УКАЗ
                </li>

            </ol>
        </nav>

        <div class="otchet-d__wrap">
            <div class="otchet-d__left">
                <div class="otchet__tree">
                    <div class="oglavlenie">Оглавление</div>
                    <ul>
                        <li data-for="0" class="itemfor otchet__li__level2 active">Статья 1. Название статьи1</li>
                        <li data-for="1" class="itemfor otchet__li__level2">Статья 2. Название статьи2</li>
                        <li data-for="2" class="itemfor otchet__li__level2">Статья 3. Название статьи3</li>
                        <li data-for="3" class="itemfor otchet__li__level2">Статья 4. Название статьи4</li>
                    </ul>
                </div>
            </div>
            <div class="otchet-d__right">
                {{--1--}}
                <div class="otchet__item active" id="item1">
                    <div class="otchet__name">Название статьи1</div>
                    <div class="otchet__data">Дата документа: 05.10.2020</div>

                    <div class="js-tabs">
                        <ul class="js-tabs__header tabs__list">
                            <li class="tab is-active">Текст</li>
                            <li class="tab">Редакции</li>
                            <li class="tab">Приложения</li>
                            <li class="tab">Связи</li>
                        </ul>
                        <div class="tabs__container">
                            <div class="js-tabs__content is-active" id="tabs1">
                                <button type="button" class="doc-text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="{{ asset('img/img.jpg') }}">
                                </button>
                                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-full">
                                        <div class="modal-content">
                                            <div class="modal-fix-close" data-bs-dismiss="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path></svg>
                                            </div>
                                            <iframe class="doc-iframe" src="http://agbs007.ru/d/blank_rezyume_bez_foto.pdf"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <h2>Lorem ipsum dolor-1</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs2">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="{{ asset('img/img.jpg') }}"> </a>
                                <h2>Lorem ipsum dolor-2</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs3">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor-3</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs4">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor-4</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                        </div>

                    </div>
                </div>
                {{--2--}}
                <div class="otchet__item" id="item2">
                    <div class="otchet__name">Название статьи2</div>
                    <div class="otchet__data">Дата документа: 05.10.2020</div>

                    <div class="js-tabs">
                        <ul class="js-tabs__header tabs__list">
                            <li class="tab is-active">Текст</li>
                            <li class="tab">Редакции</li>
                            <li class="tab">Приложения</li>
                            <li class="tab">Связи</li>
                        </ul>
                        <div class="tabs__container">
                            <div class="js-tabs__content is-active" id="tabs1">
                                <button type="button" class="doc-text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="./img/img.jpg">
                                </button>
                                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-full">
                                        <div class="modal-content">
                                            <div class="modal-fix-close" data-bs-dismiss="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path></svg>
                                            </div>
                                            <iframe class="doc-iframe" src="http://agbs007.ru/d/blank_rezyume_bez_foto.pdf"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <h2>Lorem ipsum dolor-2</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor-2</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs2">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor2</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs3">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor3</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs4">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor4</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                        </div>

                    </div>
                </div>
                {{--3--}}
                <div class="otchet__item" id="item3">
                    <div class="otchet__name">Название статьи3</div>
                    <div class="otchet__data">Дата документа: 05.10.2020</div>

                    <div class="js-tabs">
                        <ul class="js-tabs__header tabs__list">
                            <li class="tab is-active">Текст</li>
                            <li class="tab">Редакции</li>
                            <li class="tab">Приложения</li>
                            <li class="tab">Связи</li>
                        </ul>
                        <div class="tabs__container">
                            <div class="js-tabs__content is-active" id="tabs1">
                                <button type="button" class="doc-text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="./img/img.jpg">
                                </button>
                                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-full">
                                        <div class="modal-content">
                                            <div class="modal-fix-close" data-bs-dismiss="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path></svg>
                                            </div>
                                            <iframe class="doc-iframe" src="http://agbs007.ru/d/blank_rezyume_bez_foto.pdf"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <h2>Lorem ipsum dolor-3</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor-3</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs2">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor2</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs3">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor3</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs4">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor4</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                        </div>

                    </div>
                </div>
                {{--4--}}
                <div class="otchet__item" id="item4">
                    <div class="otchet__name">Название статьи4</div>
                    <div class="otchet__data">Дата документа: 05.10.2020</div>

                    <div class="js-tabs">
                        <ul class="js-tabs__header tabs__list">
                            <li class="tab is-active">Текст</li>
                            <li class="tab">Редакции</li>
                            <li class="tab">Приложения</li>
                            <li class="tab">Связи</li>
                        </ul>
                        <div class="tabs__container">
                            <div class="js-tabs__content is-active" id="tabs1">
                                <button type="button" class="doc-text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="./img/img.jpg">
                                </button>
                                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-full">
                                        <div class="modal-content">
                                            <div class="modal-fix-close" data-bs-dismiss="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path></svg>
                                            </div>
                                            <iframe class="doc-iframe" src="http://agbs007.ru/d/blank_rezyume_bez_foto.pdf"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <h2>Lorem ipsum dolor-4</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor-4</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs2">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor2</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs3">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor3</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                            <div class="js-tabs__content" id="tabs4">

                                <a href="./img/img.jpg" data-fslightbox="gallery"><img src="./img/img.jpg"> </a>
                                <h2>Lorem ipsum dolor4</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                                <h2>Lorem ipsum dolor</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet</p>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('./libs/select/custom-select.js') }}"></script>
@endsection
