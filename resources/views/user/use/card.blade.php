@extends('theme')

@section('title', 'Карта маршрута')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-2">

        <div>
            <h1 class="fw-bold mb-1">
                Карта перемещения
            </h1>

            <p class="text-muted mb-0">
                Маршрут использования оборудования
            </p>
        </div>

        <span class="badge bg-primary fs-6 px-3 py-2">
            {{ $use->coords->count() }} точек
        </span>

    </div>

    <div class="row g-4">

        {{-- LEFT INFO --}}
        <div class="col-12 col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">
                        {{ $use->eqip->name }}
                    </h5>

                    <div class="mb-3">
                        <small class="text-muted d-block">Сотрудник</small>
                        <div class="fw-semibold">
                            {{ $use->user->fio }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Дата начала</small>
                        <div class="fw-semibold">
                            {{ $use->date_start }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Дата окончания</small>
                        <div class="fw-semibold">
                            {{ $use->date_end ?? 'Активно' }}
                        </div>
                    </div>

                    <hr>

                    <div class="text-muted small">
                        <i class="bi bi-info-circle me-1"></i>
                        На карте отображается путь перемещения оборудования
                    </div>

                </div>

            </div>

        </div>

        {{-- MAP --}}
        <div class="col-12 col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-2 p-md-3">

                    <div id="map" style="width: 100%; height: 600px; border-radius: 12px; overflow: hidden;"></div>

                </div>

            </div>

        </div>

    </div>
</div>

{{-- Yandex Maps --}}
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<script>
    ymaps.ready(function () {

        const coords = @json($use -> coords);

        if (!coords || coords.length === 0) {
            document.getElementById('map').innerHTML =
                `<div class="d-flex justify-content-center align-items-center h-100 text-muted">
                Нет координат для отображения
             </div>`;
            return;
        }

        const map = new ymaps.Map("map", {
            center: [coords[0].x, coords[0].y],
            zoom: 12,
            controls: ["zoomControl", "fullscreenControl"]
        });

        const points = coords.map(c => [c.x, c.y]);

        // Start
        const start = new ymaps.Placemark(points[0], {
            balloonContent: 'Старт ' + coords[0]['datetime']
        }, {
            preset: 'islands#greenCircleDotIcon'
        });

        // End
        const end = new ymaps.Placemark(points[points.length - 1], {
            balloonContent: 'Финиш ' + coords[points.length - 1]['datetime']

        }, {
            preset: 'islands#redCircleDotIcon'
        });

        map.geoObjects.add(start);
        map.geoObjects.add(end);

        // Route line
        const route = new ymaps.Polyline(points, {}, {
            strokeColor: "#0d6efd",
            strokeWidth: 5,
            strokeOpacity: 0.8
        });

        map.geoObjects.add(route);

        // Fit bounds
        const bounds = ymaps.util.bounds.fromPoints(points);
        map.setBounds(bounds, {
            checkZoomRange: true,
            zoomMargin: 40
        });

    });
</script>

@endsection
