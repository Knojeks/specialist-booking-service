@extends('layouts.app')

@section('title', 'Регистрация — Запись к врачу')

@section('content')
    <section class="card" aria-labelledby="register-title">
        <h1 id="register-title">Создать аккаунт</h1>
        <p class="subtitle">
            Зарегистрируйтесь, чтобы записываться к врачу.
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-form-field
                name="name"
                label="Имя"
                autocomplete="name"
                maxlength="255"
                required
            />

            <x-form-field
                name="email"
                label="Email"
                type="email"
                autocomplete="email"
                maxlength="255"
                required
            />

            <x-form-field
                name="password"
                label="Пароль"
                type="password"
                autocomplete="new-password"
                minlength="8"
                required
            />

            <x-form-field
                name="password_confirmation"
                label="Повторите пароль"
                type="password"
                autocomplete="new-password"
                minlength="8"
                required
            />

            <button class="button button-full" type="submit">
                Зарегистрироваться
            </button>
        </form>

        <p class="form-footer">
            Уже есть аккаунт?
            <a href="{{ route('login') }}">Войти</a>
        </p>
    </section>
@endsection
