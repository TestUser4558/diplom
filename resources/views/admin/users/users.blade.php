@extends('theme')

@section('title', 'Пользователи')

@section('content')

<div class="mb-4">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h1 class="fw-bold mb-1">
                Пользователи
            </h1>

            <p class="text-muted mb-0">
                Управление пользователями системы
            </p>
        </div>

        <a
            class="btn btn-success"
            href="{{ route('users.create') }}"
        >
            <i class="bi bi-person-plus-fill me-1"></i>
            Добавить пользователя
        </a>

    </div>

    {{-- Desktop Table --}}
    <div class="card border-0 shadow-sm d-none d-lg-block">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>ФИО</th>
                            <th>Логин</th>
                            <th>Телефон</th>
                            <th>Доступ</th>
                            <th class="text-center">Действия</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)

                        <tr>

                            {{-- User --}}
                            <td>
                                <div class="d-flex align-items-center gap-3">

                                    <div
                                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                        style="width: 45px; height: 45px; font-weight: 700;"
                                    >
                                        {{ mb_substr($user->fio, 0, 1) }}
                                    </div>

                                    <div>
                                        <div class="fw-semibold">
                                            {{ $user->fio }}
                                        </div>

                                        <small class="text-muted">
                                            ID: {{ $user->id }}
                                        </small>
                                    </div>

                                </div>
                            </td>

                            {{-- Login --}}
                            <td>
                                <span class="badge bg-dark">
                                    {{ $user->login }}
                                </span>
                            </td>

                            {{-- Phone --}}
                            <td>
                                <a
                                    href="tel:{{ $user->phone }}"
                                    class="text-decoration-none"
                                >
                                    {{ $user->phone }}
                                </a>
                            </td>

                            {{-- Role --}}
                            <td>

                                @php
                                    $roleColor = match(strtolower($user->role->name)) {
                                        'admin' => 'danger',
                                        'manager' => 'warning',
                                        default => 'primary'
                                    };
                                @endphp

                                <span class="badge bg-{{ $roleColor }}">
                                    {{ $user->role->name }}
                                </span>

                            </td>

                            {{-- Actions --}}
                            <td>

                                <div class="d-flex flex-wrap justify-content-center gap-2">

                                    <a
                                        class="btn btn-outline-primary btn-sm"
                                        href="{{ route('users.update', ['user'=>$user]) }}"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                        Изменить
                                    </a>

                                    <a
                                        class="btn btn-outline-warning btn-sm"
                                        href="{{ route('users.change', ['user'=>$user]) }}"
                                    >
                                        <i class="bi bi-key"></i>
                                        Пароль
                                    </a>

                                    <form method="post">
                                        @csrf

                                        <button
                                            class="btn btn-outline-danger btn-sm"
                                            type="submit"
                                            formaction="{{ route('users.delete', ['user'=>$user]) }}"
                                            onclick="return confirm('Удалить пользователя?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                            Удалить
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- Mobile Cards --}}
    <div class="d-lg-none">

        @foreach ($users as $user)

        @php
            $roleColor = match(strtolower($user->role->name)) {
                'admin' => 'danger',
                'manager' => 'warning',
                default => 'primary'
            };
        @endphp

        <div class="card border-0 shadow-sm mb-3">

            <div class="card-body">

                {{-- Top --}}
                <div class="d-flex align-items-start justify-content-between mb-3">

                    <div class="d-flex align-items-center gap-3">

                        <div
                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; font-weight: 700;"
                        >
                            {{ mb_substr($user->fio, 0, 1) }}
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                {{ $user->fio }}
                            </h5>

                            <span class="badge bg-dark">
                                {{ $user->login }}
                            </span>

                        </div>

                    </div>

                    <span class="badge bg-{{ $roleColor }}">
                        {{ $user->role->name }}
                    </span>

                </div>

                {{-- Phone --}}
                <div class="mb-3">

                    <small class="text-muted d-block">
                        Телефон
                    </small>

                    <a
                        href="tel:{{ $user->phone }}"
                        class="text-decoration-none fw-semibold"
                    >
                        {{ $user->phone }}
                    </a>

                </div>

                {{-- Buttons --}}
                <div class="d-grid gap-2">

                    <a
                        class="btn btn-outline-primary"
                        href="{{ route('users.update', ['user'=>$user]) }}"
                    >
                        <i class="bi bi-pencil-square me-1"></i>
                        Изменить данные
                    </a>

                    <a
                        class="btn btn-outline-warning"
                        href="{{ route('users.change', ['user'=>$user]) }}"
                    >
                        <i class="bi bi-key me-1"></i>
                        Изменить пароль
                    </a>

                    <form method="post">
                        @csrf

                        <button
                            class="btn btn-danger w-100"
                            type="submit"
                            formaction="{{ route('users.delete', ['user'=>$user]) }}"
                            onclick="return confirm('Удалить пользователя?')"
                        >
                            <i class="bi bi-trash me-1"></i>
                            Удалить
                        </button>
                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection
