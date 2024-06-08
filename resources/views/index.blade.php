@extends('app')

@section('content')
    <table style="border-spacing: 10px; border-color: rgb(0, 0, 0); border-style: solid;">
        <th>Имя</th>
        <th>Номер телефона</th>
        <th>Почта</th>
        <th>Секция</th>
        <th>Дата рождения:</th>
        <th>Доклад</th>

        @foreach($confs as $conf)
            <tr>
                <td>{{ $conf->full_name }}</td>
                <td>{{ $conf->phone }}</td>
                <td>{{ $conf->email }}</td>
                <td>{{ $conf->section }}</td>
                <td>{{ $conf->birth_date }}</td>
                <td>{{ $conf->report_theme ?? 'Нету' }}</td>
            </tr>
        @endforeach
        
    </table>
@endsection