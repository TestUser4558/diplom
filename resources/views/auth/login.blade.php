@extends('theme')

@section('title', 'Авторизация')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">

    <div class="col-12 col-sm-10 col-md-6 col-lg-4">

        {{-- Card --}}
        <div class="card border-0 shadow-sm">

            {{-- Header --}}
            <div class="card-body p-4">

                <div class="text-center mb-4">

                    <div class="rounded-circle bg-primary bg-opacity-25 text-primary d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="bi bi-box-arrow-in-right fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-1">
                        Авторизация
                    </h1>

                    <p class="text-muted mb-0">
                        Войдите в систему
                    </p>

                </div>

                <form action="" method="post">

                    @csrf

                    {{-- Login --}}
                    <div class="mb-3">

                        <label for="login" class="form-label fw-semibold">
                            <i class="bi bi-person me-1"></i>
                            Логин
                        </label>

                        <input type="text" class="form-control form-control-lg" name="login" id="login"
                            placeholder="Введите логин" required>

                    </div>

                    {{-- Password --}}
                    <div class="mb-4">

                        <label for="password" class="form-label fw-semibold">
                            <i class="bi bi-lock me-1"></i>
                            Пароль
                        </label>

                        <input type="password" class="form-control form-control-lg" name="password" id="password"
                            placeholder="Введите пароль" required>

                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Войти
                    </button>

                </form>

            </div>

        </div>

        {{-- Footer hint --}}
        <div class="text-center mt-3 text-muted small">
            Доступ только для зарегистрированных пользователей
        </div>

    </div>

</div>

@endsection
