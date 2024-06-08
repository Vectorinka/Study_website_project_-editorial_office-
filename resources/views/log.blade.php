@extends('app')

@section('content')
	<div class="registration-form">
		<h2>Форма авторизации</h2>
		<form method="POST" action="{{ route('log') }}">
			@csrf
			
			<label for="login">Логин:</label>
			<input type="text" id="login" name="login" required pattern="[a-zA-Z0-9-_]{3,}">
			<div class="error" id="login-error"></div>
			
			<label for="password">Пароль:</label>
			<input type="password" id="password" name="password" required minlength="6">
			<div class="error" id="password-error"></div>
			
			<label for="save-data">Сохранить данные:</label>
			<input type="checkbox" id="save-data" name="save-data">

			@if($errors->any())
				<div style="color: red">
					{{ $errors->first() }}
				</div>
			@endif
			
			<input type="submit" value="авторизоваца">
		</form>
	</div>
@endsection
	