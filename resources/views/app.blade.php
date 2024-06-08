<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редакция</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
        ])
</head>
<body>
    <div class="container">
        <header>
            <h1>Редакция</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('conf') }}">Регистрация участников конференции</a></li>
                    <li><a href="{{ route('gallery') }}">Фотогаллерея</a></li>
                    
                    @if(!Auth::check())
                        <li><a href="{{ route('reg') }}">Регистрация</a></li>
                        <li><a href="{{ route('log') }}">Авторизация</a></li>
                    @else
                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                        <li><a href="{{ route('twitter') }}">Минитвитер</a></li>
                        <li><a href="{{ route('test') }}">Тест</a></li>
                    @endif

                    <li><a href="{{ route('developer') }}">Об разработчике</a></li>

                </ul>
            </nav>
        </header>
            @yield('content')
        <footer>
            <p>&copy; 2012-2013 ЗАО «Компания» info@name.ru</p>
        </footer>
    </div>
</body>
</html>