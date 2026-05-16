@extends('theme')

@section('title', 'Создание пользователя')

@section('content')

<div class="row justify-content-center">

    <div class="col-12 col-md-10 col-lg-7 col-xl-6">

        {{-- Card --}}
        <div class="card border-0 shadow-sm">

            {{-- Header --}}
            <div class="card-header bg-white border-0 pt-4 pb-0">

                <div class="text-center">

                    <div class="rounded-circle bg-success bg-opacity-25 text-success d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="bi bi-person-plus-fill fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-2">
                        Создание пользователя
                    </h1>

                    <p class="text-muted mb-0">
                        Добавление нового пользователя в систему
                    </p>

                </div>

            </div>

            {{-- Form --}}
            <div class="card-body p-4">

                <form action="" method="post">

                    @csrf

                    {{-- Login --}}
                    <div class="mb-4">

                        <label for="login" class="form-label fw-semibold">
                            <i class="bi bi-person-badge me-1"></i>
                            Логин
                        </label>

                        <input type="text" class="form-control form-control-lg" name="login" id="login"
                            value="{{ old('login') }}" placeholder="Введите логин" required>

                    </div>

                    {{-- FIO --}}
                    <div class="mb-4">

                        <label for="fio" class="form-label fw-semibold">
                            <i class="bi bi-person me-1"></i>
                            ФИО
                        </label>

                        <input type="text" class="form-control form-control-lg" name="fio" id="fio"
                            value="{{ old('fio') }}" placeholder="Введите ФИО" required>

                    </div>

                    {{-- Phone --}}
                    <div class="mb-4">

                        <label for="phone" class="form-label fw-semibold">
                            <i class="bi bi-telephone me-1"></i>
                            Телефон
                        </label>

                        <input type="text" class="form-control form-control-lg" name="phone" id="phone"
                            value="{{ old('phone') }}" placeholder="+7 (999) 999-99-99" required>

                    </div>

                    {{-- Password --}}
                    <div class="mb-4">

                        <label for="password" class="form-label fw-semibold">
                            <i class="bi bi-lock me-1"></i>
                            Пароль
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text">
                                <i class="bi bi-shield-lock"></i>
                            </span>

                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Введите пароль" required>

                        </div>

                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">

                        <label for="password_confirmed" class="form-label fw-semibold">
                            <i class="bi bi-lock-fill me-1"></i>
                            Повторите пароль
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text">
                                <i class="bi bi-check2-circle"></i>
                            </span>

                            <input type="password" class="form-control" name="password_confirmed"
                                id="password_confirmed" placeholder="Повторите пароль" required>

                        </div>

                    </div>

                    {{-- Role --}}
                    <div class="mb-4">

                        <label for="role_id" class="form-label fw-semibold">
                            <i class="bi bi-shield-lock me-1"></i>
                            Роль
                        </label>

                        <select class="form-select form-select-lg" name="role_id" id="role_id" required>

                            @foreach ($roles as $role)

                            <option value="{{ $role->id }}" @selected(old('role_id')==$role->id)
                                >
                                {{ $role->name }}
                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Buttons --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">

                        <a href="{{ url()->previous() }}" class="btn btn-light border px-4">
                            <i class="bi bi-arrow-left me-1"></i>
                            Назад
                        </a>

                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-person-plus me-1"></i>
                            Создать пользователя
                        </button>

                    </div>

                </form>

            </div>

        </div>

        {{-- Info Block --}}
        <div class="card border-0 shadow-sm mt-4 bg-light">

            <div class="card-body">

                <h5 class="fw-bold mb-3">
                    <i class="bi bi-info-circle text-primary me-2"></i>
                    Информация
                </h5>

                <ul class="mb-0 text-muted">

                    <li>Логин должен быть уникальным</li>

                    <li>Телефон рекомендуется указывать в международном формате</li>

                    <li>Пароль должен содержать минимум 8 символов</li>

                    <li>Роль определяет уровень доступа пользователя</li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection
