@extends('theme')

@section('title', 'Изменение пароля')

@section('content')

<div class="row justify-content-center">

    <div class="col-12 col-md-8 col-lg-6 col-xl-5">

        {{-- Card --}}
        <div class="card border-0 shadow-sm">

            {{-- Header --}}
            <div class="card-header bg-white border-0 pt-4 pb-0">

                <div class="text-center">

                    <div class="rounded-circle bg-warning bg-opacity-25 text-warning d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="bi bi-key-fill fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-2">
                        Изменение пароля
                    </h1>

                    <p class="text-muted mb-0">
                        Установите новый пароль для пользователя
                    </p>

                </div>

            </div>

            {{-- Form --}}
            <div class="card-body p-4">

                <form action="" method="post">

                    @csrf

                    {{-- Password --}}
                    <div class="mb-4">

                        <label for="password" class="form-label fw-semibold">
                            <i class="bi bi-lock me-1"></i>
                            Новый пароль
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text">
                                <i class="bi bi-shield-lock"></i>
                            </span>

                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Введите новый пароль" required>

                        </div>

                        <div class="form-text">
                            Пароль должен быть надежным
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

                    {{-- Buttons --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">

                        <a href="{{ url()->previous() }}" class="btn btn-light border px-4">
                            <i class="bi bi-arrow-left me-1"></i>
                            Назад
                        </a>

                        <button type="submit" class="btn btn-warning px-4">
                            <i class="bi bi-check-circle me-1"></i>
                            Сохранить пароль
                        </button>

                    </div>

                </form>

            </div>

        </div>

        {{-- Security Tips --}}
        <div class="card border-0 shadow-sm mt-4 bg-light">

            <div class="card-body">

                <h5 class="fw-bold mb-3">
                    <i class="bi bi-shield-check text-success me-2"></i>
                    Рекомендации по безопасности
                </h5>

                <ul class="mb-0 text-muted">

                    <li>Используйте минимум 8 символов</li>

                    <li>Добавьте цифры и специальные символы</li>

                    <li>Не используйте простые пароли</li>

                    <li>Храните пароль в безопасном месте</li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection
