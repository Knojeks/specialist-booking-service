@extends('layouts.app')

@section('title', 'Запись к врачу')

@section('content')
    <section class="card" aria-labelledby="home-title">
        <h1 id="home-title">Запись к врачу</h1>

        <p class="subtitle">
            Выбирайте специалиста и планируйте посещение клиники.
        </p>

        @auth
            <a class="button button-full" href="{{ route('dashboard') }}">
                Открыть личный кабинет
            </a>
        @else
            <a class="button button-full" href="{{ route('register') }}">
                Создать аккаунт
            </a>

            <p class="form-footer">
                Уже зарегистрированы?
                <a href="{{ route('login') }}">Войти</a>
            </p>
        @endauth
    </section>
@endsection
