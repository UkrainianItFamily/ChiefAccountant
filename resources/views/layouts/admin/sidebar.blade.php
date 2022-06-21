@section('sidebar')
    <div class="logo">
        <img src="{{ asset("./img/1c-logo.png") }}">
    </div>
    <div class="vhod">
        <div class="login">
            <div>
                <img src="{{ asset("./img/user.png") }}">
                <span>Панель управления</span>
            </div>
        </div>
    </div>
    <nav class="navbar">
        <ul class="sidebar__menu navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('index') }}"><i class="fas fa-home"></i>Главная</a>
            </li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-database"></i>Нормативная база</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-donate"></i>Налоговоя система</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-balance-scale-left"></i>Консультации и
                    аналитика</a></li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-file-invoice"></i>
                    Отчетность
                </a>
                <ul>
                    <li>
                        <a class="nav-link" href="{{ route("admin.getAllReports") }}"><i class="far fa-edit"></i> Отчёты</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route("admin.getAllReportsCategory") }}"><i class="far fa-edit"></i> Категории</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-receipt"></i>Формы и бланки</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-book"></i>Справочники</a></li>
        </ul>
        <ul class="sidebar__menu navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route("admin.getAllNews") }}"><i
                        class="far fa-newspaper"></i>Новости</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("admin.getAllPublishes") }}"><i
                        class="fab fa-leanpub"></i>Опубликовано на сайте</a>
            </li>
            <li class="nav-item"><a class="nav-link" href=""><i class="far fa-calendar-alt"></i>Календарь бухгалтера</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route("admin.getAllCurrencys") }}"><i
                        class="fas fa-chart-line"></i>Курс валют НБУ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("admin.getAllUsefulLinks") }}"><i
                        class="fas fa-link"></i>Полезные ссылки</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("admin.getAllMainSliderSlides") }}"><i
                        class="far fa-newspaper"></i>Слайдер</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.getUserListPage') }}">
                    <i class="fas fa-users"></i>Пользователи</a></li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="far fa-file-word"></i>
                    Страница "Помощь"
                </a>
                <ul>
                    <li>
                        <a class="nav-link" href="{{ route("admin.getAllHelpCategories") }}"><i class="far fa-edit"></i> Категории</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route("admin.getAllHelps") }}"><i class="far fa-edit"></i> Статьи</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.getAllEntrepreneurialActivity') }}"><i
                        class="fas fa-briefcase"></i>Настройка ПД</a></li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="far fa-id-badge"></i>
                    Страница "Контакты"
                </a>
                <ul>
                    <li>
                        <a class="nav-link" href="{{ route('admin.contacts.getAllFeedbackInfo') }}"><i class="far fa-edit"></i> Редактировать контакты</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.contacts.question') }}"><i class="far fa-edit"></i> Редактировать Раздел: Тематика вопроса</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route("admin.contacts.getAllFeedbackPage") }}"><i class="fas fa-info"></i> Обращения</a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="sidebar__menu navbar-nav">
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-file-signature"></i>Пользовательское
                    соглашение</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="far fa-file-word"></i>Договор на оказание
                    услуг</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-file-invoice"></i>Публичный договор</a>
            </li>
        </ul>
    </nav>
