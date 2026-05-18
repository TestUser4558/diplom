@extends('theme')

@section('title', 'Оборудование')

@section('content')

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

                                    <form>
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
