<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Каталог врачей</title>
</head>
<body>
<h1>Каталог врачей</h1>

<ul>
    @forelse ($doctors as $doctor)
        <li>
            <strong>{{ $doctor->name }}</strong>
            — {{ $doctor->specialty }}

            <a href="{{ route('doctors.schedule', ['doctor' => $doctor->id]) }}">
                Расписание
            </a>
        </li>
    @empty
        <li>Врачи пока не добавлены.</li>
    @endforelse
</ul>
</body>
</html>
