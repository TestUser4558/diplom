@extends('theme')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                        <div>
                            <h1 class="h2 mb-2 fw-bold">{{ $eqip->name }}</h1>

                            <span class="badge bg-success">
                                Оборудование
                            </span>
                        </div>

                        <div class="text-md-end">
                            <a class="btn btn-primary"
                               href="{{ route('pdf', ['eqip' => $eqip]) }}">
                                <i class="bi bi-file-earmark-pdf"></i>
                                Скачать отчет
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Info --}}
    <div class="row g-4">

        {{-- Left column --}}
        <div class="col-12 col-lg-8">

            {{-- Description --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">
                        Описание
                    </h4>

                    <p class="card-text text-muted mb-0">
                        {{ $eqip->description }}
                    </p>
                </div>
            </div>

            {{-- History --}}
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">История использования</h4>

                        <span class="badge bg-secondary">
                            {{ $eqip->usings->count() }}
                        </span>
                    </div>

                    {{-- Desktop table --}}
                    <div class="table-responsive d-none d-md-block">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Сотрудник</th>
                                    <th>Дата старта</th>
                                    <th>Дата окончания</th>

                                    @middle
                                    <th class="text-center">Действия</th>
                                    @endmiddle
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($eqip->usings as $use)
                                    <tr>
                                        <td class="fw-semibold">
                                            {{ $use->user->fio }}
                                        </td>

                                        <td>
                                            {{ $use->date_start }}
                                        </td>

                                        <td>
                                            {{ $use->date_end ?? '—' }}
                                        </td>

                                        @middle
                                        <td class="text-center">
                                            <form>
                                                @csrf

                                                <button
                                                    class="btn btn-sm btn-outline-primary"
                                                    type="submit"
                                                    formaction="{{ route('eqip.useinfo', ['use' => $use]) }}"
                                                >
                                                    Подробнее
                                                </button>
                                            </form>
                                        </td>
                                        @endmiddle
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Mobile cards --}}
                    <div class="d-md-none">

                        @foreach ($eqip->usings as $use)
                            <div class="border rounded-3 p-3 mb-3 bg-light">

                                <div class="mb-2">
                                    <small class="text-muted d-block">
                                        Сотрудник
                                    </small>

                                    <div class="fw-semibold">
                                        {{ $use->user->fio }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted d-block">
                                            Старт
                                        </small>

                                        <div>
                                            {{ $use->date_start }}
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <small class="text-muted d-block">
                                            Окончание
                                        </small>

                                        <div>
                                            {{ $use->date_end ?? '—' }}
                                        </div>
                                    </div>
                                </div>

                                @middle
                                <div class="mt-3">
                                    <form>
                                        @csrf

                                        <button
                                            class="btn btn-primary w-100"
                                            type="submit"
                                            formaction="{{ route('eqip.useinfo', ['use' => $use]) }}"
                                        >
                                            Подробнее
                                        </button>
                                    </form>
                                </div>
                                @endmiddle

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>

        {{-- Right column --}}
        <div class="col-12 col-lg-4">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h4 class="mb-4">
                        Информация
                    </h4>

                    @middle
                    <div class="mb-4">
                        <small class="text-muted d-block">
                            Токен
                        </small>

                        <div class="fw-semibold text-break">
                            {{ $eqip->token }}
                        </div>
                    </div>
                    @endmiddle

                    <div>
                        <small class="text-muted d-block">
                            Дата последней поверки
                        </small>

                        <div class="fw-semibold">
                            {{ $eqip->last_chek_date }}
                        </div>
                    </div>
                    <div>
                        <small class="text-muted d-block">
                           Сертификат поверки
                        </small>

                        <div class="fw-semibold">
                                                <a
                                                    class="btn btn-sm btn-outline-primary"
                                                    href="{{$eqip->certificate}}"
                                                >
                                                    Подробнее
                                                </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
