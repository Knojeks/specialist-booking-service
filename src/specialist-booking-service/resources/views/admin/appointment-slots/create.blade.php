@extends('layouts.app')

@section('title', 'Добавить время приёма')

@section('content')
    <section class="card" aria-labelledby="slot-title">
        <p class="subtitle">
            <a href="{{ route('doctors.index') }}">← Вернуться к каталогу</a>
        </p>

        <h1 id="slot-title">Добавить время приёма</h1>

        <dl class="profile-details">
            <dt>Врач</dt>
            <dd>{{ $doctor->name }}</dd>

            <dt>Специальность</dt>
            <dd>{{ $doctor->specialty }}</dd>
        </dl>

        <p class="subtitle">
            Длительность приёма — 30 минут.
            Время указывается по Саратову.
        </p>

        @if (session('status'))
            <div class="notice" role="status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('admin.appointment-slots.store', ['doctor' => $doctor->id]) }}">
            @csrf

            <x-form-field
                name="starts_at"
                label="Начало приёма"
                type="datetime-local"
                max="9999-12-31T23:59"
                required
            />

            <button class="button button-full" type="submit">
                Добавить слот
            </button>
        </form>
    </section>
@endsection
