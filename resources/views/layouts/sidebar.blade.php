<div class="sidebar">
    <div class="logo">
        <img src="{{ asset("./img/1c-logo.png") }}">
    </div>
    <div class="vhod">
        @guest()
            <div class="login">
                <div>
                    <img src="{{ asset("img/user.png") }}">
                    <span>Личный кабинет</span>
                </div>
                <div class="vhod__text">
                    <b>Демонстративный доступ</b> Давно выяснено, что при оценке дизайна и композиции читаемый текст
                    мешает
                    <a href="">сосредоточиться</a>. Lorem Ipsum используют потому, что тот обеспечивает более или менее
                    стандартное заполнение
                    шаблона
                </div>
                <div class="vhod-btns">
                    <a href="{{ route('user.loginPage') }}" class="btn btn-primary">Вход</a>
                    <a href="{{ route('user.registrationPage') }}" class="btn btn-link">Регистрация</a>
                </div>
            </div>
        @endguest

            @auth()
                <div class="profile-sidebar__title my-2">
                    <img width="45" height="45" src="{{ asset("img/user.png") }} ">
                    Личный кабинет
                </div>
                <div class="profile-sidebar-log" >
                    <div>
                        <div>{{  auth()->user()->name }}</div>
                        <div>{{  auth()->user()->email }}</div>
                        @if(auth()->user()->isAdmin())
                            <div>Доступ: есть</div>
                        @else
                            <div>Доступ: нет</div>
                        @endif
                    </div>
                </div>
                <ul>
                    <li class="active">
                        <a href="{{ route('user.personalPage', auth()->user()->id ) }}">
                            <i class="fas fa-user"></i>
                            Профиль
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.favoritesPage', auth()->user()->id) }}">
                            <i class="far fa-plus-square"></i>
                            Избраное
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="far fa-calendar-alt"></i>
                            Личный Календарь
                        </a>
                    </li>
                </ul>
                <div class="vhod-btns">
                    <a href="{{ route("user.logout") }}" class="btn btn-primary">Выход</a>
                </div>
                @if(auth()->user()->isAdmin())
                    <div class="vhod-btns">
                        <a href="{{ route('admin.homePage') }}" class="btn btn-primary text-light">Панель администратора</a>
                    </div>
                @endif
            @endauth
    </div>

    <nav class="navbar">
        <ul class="sidebar__menu navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('index') }}"><i class="fas fa-home"></i>Главная</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('report.list') }}"><i class="fas fa-database"></i>Нормативная база</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-donate"></i>Налоговоя система</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-balance-scale-left"></i>Консультации и
                    аналитика</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ route('reporting.getAllReports') }}"><i
                        class="fas fa-file-invoice"></i>Отчетность</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-receipt"></i>Формы и
                    бланки</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-book"></i>Справочники</a></li>
        </ul>
        <ul class="sidebar__menu navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route("news.getAllPage") }}"><i
                        class="far fa-newspaper"></i>Новости</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("published.getAllUser") }}"><i
                        class="fab fa-leanpub"></i>Опубликовано на сайте</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="far fa-calendar-alt"></i>Календарь бухгалтера</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route("currency.getAll") }}"><i
                        class="fas fa-chart-line"></i>Курс валют НБУ</a>
            </li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-link"></i>Полезные ссылки</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('help') }}"><i class="fas fa-info"></i>Помощь</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}"><i class="fas fa-address-book"></i>Контакты</a>
            </li>
        </ul>
        <ul class="sidebar__menu navbar-nav">
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-file-signature"></i>Пользовательськое
                    соглашение</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="far fa-file-word"></i>Договор на
                    оказание услуг</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-file-invoice"></i>Публичный
                    договор</a></li>
        </ul>
    </nav>
</div>
