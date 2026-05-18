@extends('theme')

@section('title', 'Оборудование')

@section('content')

{{-- USING EQUIPMENT --}}
@middle
<div class="mb-5">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="fw-bold mb-1">
                Используемое оборудование
            </h1>

            <p class="text-muted mb-0">
                Оборудование, закрепленное за сотрудниками
            </p>
        </div>

        <span class="badge bg-primary fs-6 px-3 py-2">
            {{ $usings->count() }}
        </span>
    </div>

    @if ($usings->isEmpty())

    <div class="card border-0 shadow-sm">
        <div class="card-body text-center py-5">

            <i class="bi bi-inbox display-4 text-muted"></i>

            <h4 class="mt-3">
                Нет используемого оборудования
            </h4>

            <p class="text-muted mb-0">
                Сейчас ни одно оборудование не используется
            </p>

        </div>
    </div>

    @else

    {{-- DESKTOP TABLE --}}
    <div class="card border-0 shadow-sm d-none d-lg-block">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Токен</th>
                            <th>Дата начала</th>
                            <th class="text-center">Действия</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usings as $use)
                        <tr>

                            <td class="fw-semibold">
                                {{ $use->eqip->name }}
                            </td>

                            <td class="text-muted">
                                {{ Str::limit($use->eqip->description, 80) }}
                            </td>

                            <td>
                                <span class="badge bg-dark">
                                    {{ $use->eqip->token }}
                                </span>
                            </td>

                            <td>
                                {{ $use->date_start }}
                            </td>

                            <td>
                                <div class="d-flex flex-nowrap justify-content-center gap-2">

                                    <form method="post">
                                        @csrf

                                        <button
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1 text-nowrap"
                                            type="submit"
                                            formaction="{{ route('eqip.acessEnd', ['eqip'=>$use]) }}"
                                        >
                                            <i class="bi bi-box-arrow-left"></i>
                                            Сдать
                                        </button>
                                    </form>

                                    <a
                                        class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 text-nowrap"
                                        href="{{ route('eqip.useinfo', ['use'=>$use]) }}"
                                    >
                                        <i class="bi bi-info-circle"></i>
                                        Подробнее
                                    </a>

                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    {{-- MOBILE CARDS --}}
    <div class="d-lg-none">

        @foreach ($usings as $use)

        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start mb-3">

                    <div>
                        <h5 class="fw-bold mb-1">
                            {{ $use->eqip->name }}
                        </h5>

                        <span class="badge bg-dark">
                            {{ $use->eqip->token }}
                        </span>
                    </div>

                    <span class="badge bg-primary">
                        Используется
                    </span>

                </div>

                <p class="text-muted small">
                    {{ $use->eqip->description }}
                </p>

                <div class="mb-3">
                    <small class="text-muted d-block">
                        Дата начала использования
                    </small>

                    <strong>
                        {{ $use->date_start }}
                    </strong>
                </div>

                <div class="d-grid gap-2">

                    <a
                        class="btn btn-outline-primary"
                        href="{{ route('eqip.useinfo', ['use'=>$use]) }}"
                    >
                        <i class="bi bi-info-circle me-1"></i>
                        Подробнее
                    </a>

                    <form method="post">
                        @csrf

                        <button
                            class="btn btn-warning w-100"
                            type="submit"
                            formaction="{{ route('eqip.acessEnd', ['eqip'=>$use]) }}"
                        >
                            <i class="bi bi-box-arrow-left me-1"></i>
                            Сдать оборудование
                        </button>
                    </form>

                </div>

            </div>
        </div>

        @endforeach

    </div>

    @endif

</div>
@endmiddle

@endsection
