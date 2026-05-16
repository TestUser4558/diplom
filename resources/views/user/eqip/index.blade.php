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

{{-- FREE EQUIPMENT --}}
<div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>
            <h1 class="fw-bold mb-1">
                Свободное оборудование
            </h1>

            <p class="text-muted mb-0">
                Доступное оборудование для назначения
            </p>
        </div>

        @admin
        <a
            class="btn btn-success"
            href="{{ route('eqip.create') }}"
        >
            <i class="bi bi-plus-circle me-1"></i>
            Добавить оборудование
        </a>
        @endadmin

    </div>

    {{-- Desktop --}}
    <div class="card border-0 shadow-sm d-none d-lg-block">
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Токен</th>
                            <th>Поверка</th>
                            <th class="text-center">Действия</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($eqips as $eqip)

                        @if (!$eqip->activeUsings->isEmpty())
                        @continue
                        @endif

                        <tr>

                            <td class="fw-semibold">
                                {{ $eqip->name }}
                            </td>

                            <td class="text-muted">
                                {{ Str::limit($eqip->description, 80) }}
                            </td>

                            <td>
                                <span class="badge bg-dark">
                                    {{ $eqip->token }}
                                </span>
                            </td>

                            <td>
                                {{ $eqip->last_chek_date }}
                            </td>

                            <td>

                                <div class="d-flex flex-no-wrap justify-content-center gap-2">

                                    <a
                                        class="btn btn-outline-primary btn-sm"
                                        href="{{ route('eqip.info', ['eqip'=>$eqip]) }}"
                                    >
                                        Подробнее
                                    </a>

                                    @middle

                                    <a
                                        class="btn btn-primary btn-sm"
                                        href="{{ route('eqip.acess', ['eqip'=>$eqip]) }}"
                                    >
                                        Назначить
                                    </a>

                                    <a
                                        class="btn btn-warning btn-sm"
                                        href="{{ route('eqip.check', ['eqip'=>$eqip]) }}"
                                    >
                                        Поверка
                                    </a>

                                    @admin

                                    <a
                                        class="btn btn-secondary btn-sm"
                                        href="{{ route('eqip.edit', ['eqip'=>$eqip]) }}"
                                    >
                                        Изменить
                                    </a>

                                    <form method="post">
                                        @csrf

                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                            formaction="{{ route('eqip.delete', ['eqip'=>$eqip]) }}"
                                        >
                                            Удалить
                                        </button>
                                    </form>

                                    @endadmin
                                    @endmiddle

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

    {{-- Mobile --}}
    <div class="d-lg-none">

        @foreach ($eqips as $eqip)

        @if (!$eqip->activeUsings->isEmpty())
        @continue
        @endif

        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start mb-3">

                    <div>
                        <h5 class="fw-bold mb-1">
                            {{ $eqip->name }}
                        </h5>

                        <span class="badge bg-dark">
                            {{ $eqip->token }}
                        </span>
                    </div>

                    <span class="badge bg-success">
                        Свободно
                    </span>

                </div>

                <p class="text-muted small">
                    {{ $eqip->description }}
                </p>

                <div class="mb-3">

                    <small class="text-muted d-block">
                        Последняя поверка
                    </small>

                    <strong>
                        {{ $eqip->last_chek_date }}
                    </strong>

                </div>

                <div class="d-grid gap-2">

                    <a
                        class="btn btn-outline-primary"
                        href="{{ route('eqip.info', ['eqip'=>$eqip]) }}"
                    >
                        <i class="bi bi-info-circle me-1"></i>
                        Подробнее
                    </a>

                    @middle

                    <a
                        class="btn btn-primary"
                        href="{{ route('eqip.acess', ['eqip'=>$eqip]) }}"
                    >
                        <i class="bi bi-person-check me-1"></i>
                        Назначить ответственного
                    </a>

                    <a
                        class="btn btn-warning"
                        href="{{ route('eqip.check', ['eqip'=>$eqip]) }}"
                    >
                        <i class="bi bi-check-circle me-1"></i>
                        Отметить поверку
                    </a>

                    @admin

                    <a
                        class="btn btn-secondary"
                        href="{{ route('eqip.edit', ['eqip'=>$eqip]) }}"
                    >
                        <i class="bi bi-pencil-square me-1"></i>
                        Изменить
                    </a>

                    <form method="post">
                        @csrf

                        <button
                            class="btn btn-danger w-100"
                            type="submit"
                            formaction="{{ route('eqip.delete', ['eqip'=>$eqip]) }}"
                        >
                            <i class="bi bi-trash me-1"></i>
                            Удалить
                        </button>
                    </form>

                    @endadmin
                    @endmiddle

                </div>

            </div>
        </div>

        @endforeach

    </div>

</div>

@endsection
