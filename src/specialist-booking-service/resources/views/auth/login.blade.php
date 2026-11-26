<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
</head>
<body>
<h1>Вход в личный кабинет</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <p>
        <label for="email">Email</label>
        <input id="email" name="email" type="email"
               value="{{ old('email') }}"
               autocomplete="username" required>
    </p>

    <p>
        <label for="password">Пароль</label>
        <input id="password" name="password" type="password"
               autocomplete="current-password" required>
    </p>

    <button type="submit">Войти</button>
</form>

<p>
    <a href="{{ route('register') }}">Зарегистрироваться</a>
</p>
</body>
</html>
