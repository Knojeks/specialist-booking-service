@extends('layouts.app')

@section('title', 'Каталог врачей — Запись к врачу')

@section('content')
    <section class="catalog" aria-labelledby="catalog-title">
        <h1 id="catalog-title">Каталог врачей</h1>
        <p class="subtitle">
            Выберите специалиста и перейдите к его расписанию.
        </p>

        <div class="doctor-grid">
            @forelse ($doctors as $doctor)
                <article class="doctor-card">
                    <p class="doctor-specialty">
                        {{ $doctor->specialty }}
                    </p>

                    <h2>{{ $doctor->name }}</h2>

                    <a
                        class="button"
                        href="{{ route('doctors.schedule', ['doctor' => $doctor->id]) }}"
                    >
                        Расписание
                    </a>

                    @if (auth()->user()?->is_admin)
                        <p>
                            <a href="{{ route('admin.appointment-slots.create', ['doctor' => $doctor->id]) }}">
                                Добавить время приёма
                            </a>
                        </p>
                    @endif
                </article>
            @empty
                <div class="notice" role="status">
                    Врачи пока не добавлены.
                </div>
            @endforelse
        </div>
    </section>
@endsection
