@extends('layouts.app')

@section('title', 'Расписание — '.$doctor->name)

@section('content')
    <section class="card" aria-labelledby="schedule-title">
        <p class="subtitle">
            <a href="{{ route('doctors.index') }}">
                ← Вернуться к каталогу
            </a>
        </p>

        <h1 id="schedule-title">{{ $doctor->name }}</h1>
        <p class="subtitle">{{ $doctor->specialty }}</p>

        <div class="notice" role="status">
            Просмотр свободного времени пока не реализован.
        </div>
    </section>
@endsection
