@extends('layouts.app')

@section('title', 'Личный кабинет — Запись к врачу')

@section('content')
    <section class="card" aria-labelledby="dashboard-title">
        <h1 id="dashboard-title">Личный кабинет</h1>
        <p class="subtitle">
            Здравствуйте, {{ auth()->user()->name }}!
        </p>

        @if (session('status'))
            <div class="notice" role="status">
                {{ session('status') }}
            </div>
        @endif

        <dl class="profile-details">
            <dt>Имя</dt>
            <dd>{{ auth()->user()->name }}</dd>

            <dt>Email</dt>
            <dd>{{ auth()->user()->email }}</dd>
        </dl>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="button button-full" type="submit">
                Выйти из аккаунта
            </button>
        </form>
    </section>
@endsection
