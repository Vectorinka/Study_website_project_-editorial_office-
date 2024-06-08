@extends('app')

@section('content')
    <h1>Минитвитер</h1>
    <form action="{{ route('twitter') }}" method="post">
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
            
                <td>{{ $tweet->username}}</td>
                <td>{{ $tweet->tweet}}</td>

                @if(Auth::user()->name === $tweet->username)
                    <td><a href="{{ route('dtweet', ['id' => $tweet->id]) }}">Удалить</a></td>
                @endif
        </tr>
        @endforeach
    </table>
@endsection
    