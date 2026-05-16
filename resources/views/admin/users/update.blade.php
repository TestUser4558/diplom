@extends('theme')

@section('title', 'Изменение пользователя')

@section('content')

<div class="row justify-content-center">

    <div class="col-12 col-md-10 col-lg-7 col-xl-6">

        {{-- Card --}}
        <div class="card border-0 shadow-sm">

            {{-- Header --}}
            <div class="card-header bg-white border-0 pt-4 pb-0">

                <div class="d-flex align-items-center gap-3">

                    {{-- Avatar --}}
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                        style="width: 60px; height: 60px; font-size: 24px; font-weight: 700;">
                        {{ mb_substr($user->fio, 0, 1) }}
                    </div>

                    <div>
                        <h1 class="h3 fw-bold mb-1">
                            Изменение данных
                        </h1>

                        <p class="text-muted mb-0">
                            Редактирование пользователя
                        </p>
                    </div>

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
                            value="{{ old('login', $user->login) }}" placeholder="Введите логин">

                    </div>

                    {{-- FIO --}}
                    <div class="mb-4">

                        <label for="fio" class="form-label fw-semibold">
                            <i class="bi bi-person me-1"></i>
                            ФИО
                        </label>

                        <input type="text" class="form-control form-control-lg" name="fio" id="fio"
                            value="{{ old('fio', $user->fio) }}" placeholder="Введите ФИО">

                    </div>

                    {{-- Phone --}}
                    <div class="mb-4">

                        <label for="phone" class="form-label fw-semibold">
                            <i class="bi bi-telephone me-1"></i>
                            Телефон
                        </label>

                        <input type="text" class="form-control form-control-lg" name="phone" id="phone"
                            value="{{ old('phone', $user->phone) }}" placeholder="+7 (999) 999-99-99">

                    </div>

                    {{-- Role --}}
                    <div class="mb-4">

                        <label for="role_id" class="form-label fw-semibold">
                            <i class="bi bi-shield-lock me-1"></i>
                            Роль
                        </label>

                        <select class="form-select form-select-lg" name="role_id" id="role_id">

                            @foreach ($roles as $role)

                            <option value="{{ $role->id }}" @selected($role->id == old('role_id', $user->role_id))
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

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i>
                            Сохранить
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
