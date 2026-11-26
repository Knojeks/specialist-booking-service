@extends('layouts.app')

@section('title', 'Вход — Запись к врачу')

@section('content')
    <section class="card" aria-labelledby="login-title">
        <h1 id="login-title">С возвращением</h1>
        <p class="subtitle">
            Войдите, чтобы управлять своими записями.
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-form-field
                name="email"
                label="Email"
                type="email"
                autocomplete="username"
                required
            />

            <x-form-field
                name="password"
                label="Пароль"
                type="password"
                autocomplete="current-password"
                required
            />

            <button class="button button-full" type="submit">
                Войти
            </button>
        </form>

        <p class="form-footer">
            Нет аккаунта?
            <a href="{{ route('register') }}">Зарегистрироваться</a>
        </p>
    </section>
@endsection
