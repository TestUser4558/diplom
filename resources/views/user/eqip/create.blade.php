@extends('theme')

@section('title', 'Добавление оборудования')

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
                        <i class="bi bi-hdd-stack-fill fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-2">
                        Добавление оборудования
                    </h1>

                    <p class="text-muted mb-0">
                        Создание новой единицы оборудования в системе
                    </p>

                </div>

            </div>

            {{-- Form --}}
            <div class="card-body p-4">

                <form action="" method="post">

                    @csrf

                    {{-- Name --}}
                    <div class="mb-4">

                        <label for="name" class="form-label fw-semibold">
                            <i class="bi bi-tag me-1"></i>
                            Название
                        </label>

                        <input type="text" class="form-control form-control-lg" name="name" id="name"
                            value="{{ old('name') }}" placeholder="Введите название оборудования" required>

                    </div>

                    {{-- Description --}}
                    <div class="mb-4">

                        <label for="description" class="form-label fw-semibold">
                            <i class="bi bi-card-text me-1"></i>
                            Описание
                        </label>

                        <textarea class="form-control form-control-lg" name="description" id="description" rows="4"
                            placeholder="Введите описание оборудования" required>{{ old('description') }}</textarea>

                    </div>

                    {{-- Buttons --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">

                        <a href="{{ url()->previous() }}" class="btn btn-light border px-4">
                            <i class="bi bi-arrow-left me-1"></i>
                            Назад
                        </a>

                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-plus-circle me-1"></i>
                            Добавить
                        </button>

                    </div>

                </form>

            </div>

        </div>

        {{-- Info --}}
        <div class="card border-0 shadow-sm mt-4 bg-light">

            <div class="card-body">

                <h5 class="fw-bold mb-3">
                    <i class="bi bi-info-circle text-primary me-2"></i>
                    Рекомендации
                </h5>

                <ul class="mb-0 text-muted">

                    <li>Название должно быть уникальным и понятным</li>

                    <li>Описание поможет сотрудникам быстрее идентифицировать оборудование</li>

                    <li>После создания оборудование можно редактировать</li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection
