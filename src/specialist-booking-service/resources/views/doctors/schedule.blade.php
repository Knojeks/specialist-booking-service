<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Расписание — {{ $doctor->name }}</title>
</head>
<body>
<a href="{{ route('doctors.index') }}">Вернуться к каталогу</a>

<h1>Расписание врача</h1>
<p>{{ $doctor->name }} — {{ $doctor->specialty }}</p>

<p></p>
</body>
</html>
