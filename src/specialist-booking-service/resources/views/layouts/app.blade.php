<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Запись к врачу')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="{{ url('/') }}">
            Запись к врачу
        </a>

        <nav class="header-nav" aria-label="Главная навигация">
            <a href="{{ route('doctors.index') }}">Каталог врачей</a>
        </nav>
    </div>
</header>

<main class="page">
    @yield('content')
</main>
</body>
</html>
