@extends('theme')

@section('title', 'Информация об использовании')

@section('content')

<div class="row g-4">

    {{-- LEFT COLUMN --}}
    <div class="col-12 col-lg-4">

        {{-- Main Info --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                {{-- Equipment --}}
                <div class="text-center mb-4">

                    <div class="rounded-circle bg-primary bg-opacity-25 text-primary d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 90px; height: 90px;">
                        <i class="bi bi-cpu fs-1"></i>
                    </div>

                    <h1 class="h3 fw-bold mb-1">
                        {{ $use->eqip->name }}
                    </h1>

                    <p class="text-muted mb-0">
                        Информация об использовании оборудования
                    </p>

                </div>

                {{-- User --}}
                <div class="border rounded-4 p-3 mb-3 bg-light">

                    <small class="text-muted d-block mb-1">
                        Ответственный сотрудник
                    </small>

                    <div class="fw-semibold fs-5">
                        <i class="bi bi-person-fill me-1"></i>
                        {{ $use->user->fio }}
                    </div>

                </div>

                {{-- Dates --}}
                <div class="border rounded-4 p-3 mb-3">

                    <div class="mb-3">

                        <small class="text-muted d-block mb-1">
                            Дата начала
                        </small>

                        <div class="fw-semibold">
                            <i class="bi bi-calendar-check me-1 text-success"></i>
                            {{ $use->date_start }}
                        </div>

                    </div>

                    <div>

                        <small class="text-muted d-block mb-1">
                            Дата окончания
                        </small>

                        <div class="fw-semibold">
                            <i class="bi bi-calendar-x me-1 text-danger"></i>
                            {{ $use->date_end ?? 'Активно' }}
                        </div>

                    </div>

                </div>

                {{-- Map Button --}}
                <div class="d-grid">

                    <form>
                        <button class="btn btn-primary btn-lg" type="submit"
                            formaction="{{ route('eqip.card', ['use'=>$use]) }}">
                            <i class="bi bi-geo-alt-fill me-1"></i>
                            Открыть карту
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

    {{-- RIGHT COLUMN --}}
    <div class="col-12 col-lg-8">

        <div class="card border-0 shadow-sm">

            {{-- Header --}}
            <div class="card-header bg-white border-0 py-3">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                    <div>

                        <h4 class="fw-bold mb-1">
                            История координат
                        </h4>

                        <p class="text-muted mb-0">
                            Перемещение оборудования
                        </p>

                    </div>

                    <span class="badge bg-primary fs-6 px-3 py-2">
                        {{ $use->coords->count() }}
                    </span>

                </div>

            </div>

            <div class="card-body">

                @if ($use->coords->isEmpty())

                {{-- Empty --}}
                <div class="text-center py-5">

                    <i class="bi bi-geo-alt display-1 text-muted"></i>

                    <h4 class="mt-3">
                        Нет координат
                    </h4>

                    <p class="text-muted mb-0">
                        Для этого оборудования отсутствуют данные о местоположении
                    </p>

                </div>

                @else

                {{-- Desktop Table --}}
                <div class="table-responsive d-none d-md-block">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>
                                <th>
                                    <i class="bi bi-arrows-move me-1"></i>
                                    Координата X
                                </th>

                                <th>
                                    <i class="bi bi-arrows-move me-1"></i>
                                    Координата Y
                                </th>

                                <th>
                                    <i class="bi bi-clock-history me-1"></i>
                                    Дата и время
                                </th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($use->coords as $coord)

                            <tr>

                                <td class="fw-semibold">
                                    {{ $coord->x }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $coord->y }}
                                </td>

                                <td>
                                    {{ $coord->datetime }}
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                {{-- Mobile Cards --}}
                <div class="d-md-none">

                    @foreach ($use->coords as $coord)

                    <div class="border rounded-4 p-3 mb-3 bg-light">

                        <div class="row g-3">

                            <div class="col-6">

                                <small class="text-muted d-block">
                                    Координата X
                                </small>

                                <div class="fw-semibold">
                                    {{ $coord->x }}
                                </div>

                            </div>

                            <div class="col-6">

                                <small class="text-muted d-block">
                                    Координата Y
                                </small>

                                <div class="fw-semibold">
                                    {{ $coord->y }}
                                </div>

                            </div>

                            <div class="col-12">

                                <small class="text-muted d-block">
                                    Дата и время
                                </small>

                                <div class="fw-semibold">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $coord->datetime }}
                                </div>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection
