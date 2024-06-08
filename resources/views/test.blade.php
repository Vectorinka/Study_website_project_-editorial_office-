@extends('app')

@section('content')
    <h2>Тест по веб программированию</h2>
    <form id="testForm">
        <div class="column">
            <h3>HTML – это …</h3>
            <input type="text" name="q1" required>
            <h3>Тэг – это…</h3>
            <input type="text" name="q2" required>
            <h3>Набор веб-страниц, связанных между собой перекрестными ссылками, расположенный под одним общим корневым именем, называется…</h3>
            <input type="text" name="q3" required>
        </div>
        <div class="column">
            <h3>Контейнер предназначен для…</h3>
            <input type="text" name="q4" required>
            <h3>Web-страница (документ HTML) представляет собой… </h3>
            <input type="text" name="q5" required>
            <h3>Какова цель тега <meta> в HTML?</h3>
            <input type="text" name="q6" required>
        </div>
        <div class="column">
            <input type="submit" value="Submit">
        </div>
    </form>

    <form action="{{ route('test') }}" method="post">
        @csrf

        <label for="text">Введите сообщение:</label>
        <input type="text" id="text" name="text" maxlength="140">
        <button type="submit">Отправить</button>
    </form>

    <table>
        <tr>
            <th>Автор</th>
            <th>Сообщение</th>
            <th>Удалить</th>
        </tr>
        @foreach ($tweets as $tweet)
        <tr>
            <td>{{ $tweet->name}}</td>
            <td>{{ $tweet->comment}}</td>

            @if(Auth::user()->name === $tweet->name)
                <td><a href="{{ route('dtest', ['id' => $tweet->id]) }}">Удалить</a></td>
            @endif
        </tr>
        @endforeach
    </table>

@endsection