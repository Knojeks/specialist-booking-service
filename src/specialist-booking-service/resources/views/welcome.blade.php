@extends('layouts.app')

@section('title', 'Запись к врачу')

@section('content')
    <section class="card" aria-labelledby="home-title">
        <h1 id="home-title">Запись к врачу</h1>

        <p class="subtitle">
            Найдите подходящего специалиста и перейдите к его расписанию.
        </p>

        <a class="button button-full" href="{{ route('doctors.index') }}">
            Выбрать врача
        </a>

        <p class="form-footer">
            @auth
                <a href="{{ route('dashboard') }}">Личный кабинет</a>
            @else
                <a href="{{ route('login') }}">Войти</a>
                или
                <a href="{{ route('register') }}">создать аккаунт</a>
            @endauth
        </p>
    </section>
@endsection
