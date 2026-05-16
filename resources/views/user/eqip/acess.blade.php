@extends('theme')

@section('title', 'Назначение ответственного')

@section('content')

<div class="row justify-content-center">

    <div class="col-12 col-md-10 col-lg-7 col-xl-6">

        {{-- Card --}}
        <div class="card border-0 shadow-sm">

            {{-- Header --}}
            <div class="card-header bg-white border-0 pt-4 pb-0">

                <div class="text-center">

                    <div class="rounded-circle bg-primary bg-opacity-25 text-primary d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="bi bi-person-check-fill fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-2">
                        Назначение ответственного
                    </h1>

                    <p class="text-muted mb-0">
                        Выберите сотрудника для оборудования
                    </p>

                </div>

            </div>

            {{-- Equipment Info --}}
            <div class="px-4 pt-4">

                <div class="alert alert-light border shadow-sm mb-0">

                    <div class="d-flex align-items-center gap-3">

                        <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;">
                            <i class="bi bi-cpu fs-4"></i>
                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Оборудование
                            </small>

                            <div class="fw-bold fs-5">
                                {{ $eqip->name }}
                            </div>

                            @if(!empty($eqip->token))
                            <span class="badge bg-dark mt-1">
                                {{ $eqip->token }}
                            </span>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

            {{-- Form --}}
            <div class="card-body p-4">

                <form action="" method="post">

                    @csrf

                    {{-- User Select --}}
                    <div class="mb-4">

                        <label for="user_id" class="form-label fw-semibold">
                            <i class="bi bi-people me-1"></i>
                            Сотрудник
                        </label>

                        <select class="form-select form-select-lg" name="user_id" id="user_id" required>

                            <option disabled selected>
                                Выберите сотрудника
                            </option>

                            @foreach ($users as $user)

                            <option value="{{ $user->id }}" @selected(old('user_id')==$user->id)
                                >
                                {{ $user->fio }}
                            </option>

                            @endforeach

                        </select>

                        <div class="form-text">
                            Сотрудник будет назначен ответственным за оборудование
                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">

                        <a href="{{ url()->previous() }}" class="btn btn-light border px-4">
                            <i class="bi bi-arrow-left me-1"></i>
                            Назад
                        </a>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-person-check me-1"></i>
                            Назначить
                        </button>

                    </div>

                </form>

            </div>

        </div>

        {{-- Info Card --}}
        <div class="card border-0 shadow-sm mt-4 bg-light">

            <div class="card-body">

                <h5 class="fw-bold mb-3">
                    <i class="bi bi-info-circle text-primary me-2"></i>
                    Информация
                </h5>

                <ul class="mb-0 text-muted">

                    <li>После назначения оборудование станет занятым</li>

                    <li>Ответственный сотрудник будет отображаться в истории</li>

                    <li>Оборудование можно вернуть позже через систему</li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection
