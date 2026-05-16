@extends('theme')

@section('title', 'Поверка оборудования')

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
                        <i class="bi bi-pencil-square fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-2">
                       Поверка оборудования
                    </h1>


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
                            Дата
                        </label>

                        <input type="date" class="form-control form-control-lg" name="date" id="date"
                         placeholder="Введите дату" required>

                    </div>

                    {{-- Description --}}
                    <div class="mb-4">

                        <label for="certificate" class="form-label fw-semibold">
                            <i class="bi bi-card-text me-1"></i>
                            Введите ссылку на сертификат поверки
                        </label>

                        <input type="text" class="form-control form-control-lg" name="certificate" id="certificate"
                            placeholder="Введите ссылку на сертификат поверки" required>

                    </div>

                    {{-- Buttons --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">

                        <a href="{{ url()->previous() }}" class="btn btn-light border px-4">
                            <i class="bi bi-arrow-left me-1"></i>
                            Назад
                        </a>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i>
                            Сохранить изменения в поверке
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
                    Информация
                </h5>

                <ul class="mb-0 text-muted">

                    <li>Изменения сразу сохраняются в системе</li>

                    <li>История изменений оборудования не удаляется</li>

                    <li>Будьте внимательны при редактировании данных</li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection
