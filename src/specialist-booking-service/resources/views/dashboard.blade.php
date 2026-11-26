<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личный кабинет</title>
</head>
<body>
<h1>Личный кабинет</h1>

@if (session('status'))
    <p>{{ session('status') }}</p>
@endif

<p>Вы вошли как {{ auth()->user()->name }}.</p>
<p>Email: {{ auth()->user()->email }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выйти</button>
</form>
</body>
</html>
