<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Везувиан')</title>

    {{-- Bootstrap --}}
    <link href="{{ asset('css/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
</head>

<body>

    {{-- NAVBAR --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">

                {{-- Logo --}}
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('eqips') }}">
                    <i class="bi bi-cpu"></i>
                    Везувиан
                </a>

                {{-- Mobile button --}}
                @auth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>
                </button>
                @endauth

                {{-- Navigation --}}
                @auth
                <div class="collapse navbar-collapse" id="mainNavbar">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-3 mt-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('eqips') }}">
                                <i class="bi bi-hdd-network me-1"></i>
                                Оборудование
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('eqipsUsing') }}">
                                <i class="bi bi-hdd-network me-1"></i>
                                Используемое Оборудование
                            </a>
                        </li>
                        @admin
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                                <i class="bi bi-people me-1"></i>
                                Люди
                            </a>
                        </li>
                        @endadmin
                    </ul>

                    {{-- Right side --}}
                    <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2">

                        <a class="btn btn-outline-light" href="{{ route('cabinet') }}">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ auth()->user()->fio }}
                        </a>

                        <a class="btn btn-danger" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right me-1"></i>
                            Выход
                        </a>

                    </div>

                </div>
                @endauth

            </div>
        </nav>
    </header>

    {{-- MAIN --}}
    <main class="py-4">

        <div class="container">

            {{-- Alerts --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">

                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            {{-- Validation errors --}}
            @if (!$errors->isEmpty())
            <div class="alert alert-danger shadow-sm border-0">
                <div class="fw-bold mb-2">
                    Ошибки:
                </div>

                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Content --}}
            @yield('content')

        </div>

    </main>

    {{-- FOOTER --}}
    <footer class="footer bg-dark text-light py-4 mt-5">
        <div class="container">

            <div class="row align-items-center text-center text-md-start">

                <div class="col-md-6 mb-3 mb-md-0">
                    <h5 class="mb-1 fw-bold">
                        Везувиан
                    </h5>

                    <small class="text-secondary">
                        Система управления оборудованием
                    </small>
                </div>

                <div class="col-md-6 text-md-end">
                    <small class="text-secondary">
                        © {{ date('Y') }} Все права защищены
                    </small>
                </div>

            </div>

        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('css/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
