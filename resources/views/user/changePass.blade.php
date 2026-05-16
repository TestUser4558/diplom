@extends('theme')

@section('title', 'Изменение пароля')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">

    <div class="col-12 col-md-8 col-lg-5">

        {{-- Card --}}
        <div class="card border-0 shadow-sm">

            {{-- Header --}}
            <div class="card-body p-4">

                <div class="text-center mb-4">

                    <div class="rounded-circle bg-warning bg-opacity-25 text-warning d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="bi bi-shield-lock-fill fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-1">
                        Изменение пароля
                    </h1>

                    <p class="text-muted mb-0">
                        Обновите пароль для вашего аккаунта
                    </p>

                </div>

                <form action="" method="post">

                    @csrf

                    {{-- Old password --}}
                    <div class="mb-3">

                        <label for="old_password" class="form-label fw-semibold">
                            <i class="bi bi-lock me-1"></i>
                            Старый пароль
                        </label>

                        <input type="password" class="form-control form-control-lg" name="old_password"
                            id="old_password" placeholder="Введите старый пароль" required>

                    </div>

                    {{-- New password --}}
                    <div class="mb-3">

                        <label for="password" class="form-label fw-semibold">
                            <i class="bi bi-key me-1"></i>
                            Новый пароль
                        </label>

                        <input type="password" class="form-control form-control-lg" name="password" id="password"
                            placeholder="Введите новый пароль" required>

                    </div>

                    {{-- Confirm password --}}
                    <div class="mb-4">

                        <label for="password_confirmation" class="form-label fw-semibold">
                            <i class="bi bi-check2-circle me-1"></i>
                            Повторите пароль
                        </label>

                        <input type="password" class="form-control form-control-lg" name="password_confirmation"
                            id="password_confirmation" placeholder="Повторите новый пароль" required>

                    </div>

                    {{-- Buttons --}}
                    <div class="d-grid gap-2">

                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="bi bi-check-circle me-1"></i>
                            Сохранить
                        </button>

                        <a href="{{ url()->previous() }}" class="btn btn-light border">
                            <i class="bi bi-arrow-left me-1"></i>
                            Назад
                        </a>

                    </div>

                </form>

            </div>

        </div>

        {{-- Info --}}
        <div class="text-center text-muted small mt-3">
            Используйте надежный пароль для защиты аккаунта
        </div>

    </div>

</div>

@endsection
