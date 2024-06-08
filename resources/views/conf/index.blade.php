@extends('app')

@section('content')
    <form id="registration-form" method="POST" action="{{ route('conf') }}">
        @csrf
        
        <h2>Регистрация участников конференции</h2>
        <label for="full-name">Имя (фамилия, имя, отчество):</label>
        <input type="text" id="full-name" name="full-name" required>
        <br><br>
        <label for="phone">Контактный телефон:</label>
        <input type="tel" id="phone" name="phone" required>
        <br><br>
        <label for="email">Адрес электронной почты:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="sections">Секции конференции:</label>
        <select id="sections" name="sections" required>
            <option value="">Выберите секцию</option>
            <option value="математика">Математика</option>
            <option value="физика">Физика</option>
            <option value="информатика">Информатика</option>
        </select>
        <br><br>
        <label for="birth-date">Дата рождения:</label>
        <input type="date" id="birth-date" name="birth-date">
        <br><br>
        <label for="report">Доклад:</label>
        <input type="checkbox" id="report" name="report" onclick="show()">
        <br><br>
        <div id="report-theme" style="display: none;">
            <label for="report-theme-input">Тема доклада:</label>
            <input type="text" id="report-theme-input" name="report-theme">
        </div>
        <br><br>
        <button type="submit">Отправить</button>

        @if($errors->any())
            <div style="color: red">
                {{ $errors->first() }}
            </div>
        @endif
        </div>
    </form>
@endsection