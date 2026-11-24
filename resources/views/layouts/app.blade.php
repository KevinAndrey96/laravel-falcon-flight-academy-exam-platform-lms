<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Falcon Escuela de Aviación') }} | Sistema de Exámenes Aeronáuticos</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        :root {
            --falcon-navy: #0f172a;
            --falcon-blue: #1e3a8a;
            --falcon-gold: #d97706;
            --falcon-accent: #2563eb;
            --falcon-bg: #f8fafc;
        }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--falcon-bg);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar-falcon {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-bottom: 2px solid #d97706;
            padding: 0.75rem 1rem;
        }
        .navbar-falcon .navbar-brand {
            color: #ffffff;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .navbar-falcon .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .navbar-falcon .nav-link:hover {
            color: #fbbf24 !important;
        }
        .badge-falcon {
            background-color: #d97706;
            color: #ffffff;
            font-size: 0.75rem;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .card-falcon {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            background: #ffffff;
            overflow: hidden;
        }
        .card-falcon .card-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            color: #ffffff;
            font-weight: 600;
            border-bottom: 2px solid #d97706;
            padding: 1rem 1.25rem;
        }
        .btn-falcon-primary {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
            color: #ffffff;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .btn-falcon-primary:hover {
            background-color: #1e40af;
            border-color: #1e40af;
            color: #ffffff;
            transform: translateY(-1px);
        }
        .btn-falcon-gold {
            background-color: #d97706;
            border-color: #d97706;
            color: #ffffff;
            font-weight: 600;
            border-radius: 8px;
        }
        .btn-falcon-gold:hover {
            background-color: #b45309;
            border-color: #b45309;
            color: #ffffff;
        }
        .footer-falcon {
            margin-top: auto;
            background: #0f172a;
            color: #94a3b8;
            font-size: 0.85rem;
            padding: 1.5rem 0;
            border-top: 1px solid #334155;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-falcon shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/Falcon.png') }}" alt="Falcon Escuela de Aviación" style="height: 44px; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.4));">
                    <span class="d-none d-sm-inline">FALCON ESCUELA DE AVIACIÓN</span>
                </a>
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto pl-md-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cuestionarios.index') }}">
                                <i class="fas fa-clipboard-check mr-1 text-warning"></i> Exámenes Aeronáuticos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('questions.index') }}">
                                <i class="fas fa-database mr-1 text-info"></i> Banco de Preguntas
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt mr-1"></i> Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus mr-1"></i> Registro Estudiante</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-pilot mr-1 text-warning"></i> {{ Auth::user()->name }}
                                    <span class="badge badge-falcon ml-1">{{ Auth::user()->role ?? 'Piloto' }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="fas fa-tachometer-alt mr-2 text-primary"></i> Panel Principal
                                    </a>
                                    <a class="dropdown-item" href="{{ route('cuestionarios.index') }}">
                                        <i class="fas fa-plane-departure mr-2 text-warning"></i> Mis Cuestionarios
                                    </a>
                                    <a class="dropdown-item" href="{{ route('questions.index') }}">
                                        <i class="fas fa-book-reader mr-2 text-info"></i> Banco de Preguntas
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off mr-2"></i> Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 flex-grow-1">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle mr-2"></i> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            @yield('content')
        </main>

        <footer class="footer-falcon">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left mb-2 mb-md-0">
                        <strong>Falcon Escuela de Aviación</strong> | Centro de Instrucción Aeronáutica Certificado UAEAC
                        <div class="small text-muted">Formación Profesional de Pilotos Comerciales (PCA), Privados (PPA) y Despachadores de Vuelo.</div>
                    </div>
                    <div class="col-md-6 text-center text-md-right">
                        <span class="badge badge-secondary mr-2">Reglamentos Aeronáuticos de Colombia (RAC)</span>
                        <span class="badge badge-warning">Estándar OACI / UAEAC</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
