@extends('theme')

@section('title', 'Личный кабинет')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 col-lg-8">

            {{-- Header Card --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">

                        <div class="d-flex align-items-center gap-3">

                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; font-size: 28px; font-weight: 700;">
                                {{ mb_substr(auth()->user()->fio, 0, 1) }}
                            </div>

                            <div>

                                <h1 class="h3 fw-bold mb-1">
                                    Добро пожаловать, {{ auth()->user()->fio }}
                                </h1>

                                <p class="text-muted mb-0">
                                    Личный кабинет пользователя
                                </p>

                            </div>

                        </div>

                        <a class="btn btn-outline-primary" href="{{ route('user.changepass') }}">
                            <i class="bi bi-key me-1"></i>
                            Изменить пароль
                        </a>

                    </div>

                </div>

            </div>

            {{-- Info Cards --}}
            <div class="row g-3">

                {{-- Login --}}
                <div class="col-12 col-md-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <small class="text-muted d-block">
                                Логин
                            </small>

                            <div class="fw-semibold fs-5">
                                <i class="bi bi-person-badge me-1"></i>
                                {{ auth()->user()->login }}
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Phone --}}
                <div class="col-12 col-md-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <small class="text-muted d-block">
                                Телефон
                            </small>

                            <div class="fw-semibold fs-5">
                                <i class="bi bi-telephone me-1"></i>
                                {{ auth()->user()->phone }}
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Role --}}
                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted d-block">
                                    Роль
                                </small>

                                <div class="fw-bold fs-5">
                                    <i class="bi bi-shield-lock me-1"></i>
                                    {{ auth()->user()->role->name }}
                                </div>

                            </div>

                            <span class="badge bg-primary fs-6 px-3 py-2">
                                Доступ
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
