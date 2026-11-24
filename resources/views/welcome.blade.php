@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark shadow-lg position-relative overflow-hidden" 
         style="background: linear-gradient(rgba(15, 23, 42, 0.88), rgba(30, 58, 138, 0.92)), url('https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat; border-bottom: 3px solid #d97706;">
        <div class="col-md-9 px-0">
            <span class="badge badge-falcon mb-3">UAEAC - RAC 61 / RAC 65 / RAC 141</span>
            <h1 class="display-4 font-weight-bold">Falcon Escuela de Aviación</h1>
            <p class="lead my-3">
                Plataforma de Evaluación Teórica, Banco de Preguntas y Certificación de Pilotos Comerciales (PCA), Pilotos Privados (PPA) y Despachadores de Vuelo.
            </p>
            <p class="text-light small">
                Evaluaciones alineadas con el banco oficial de conocimientos teóricos de la Unidad Administrativa Especial de Aeronáutica Civil (UAEAC) de Colombia y la Organización de Aviación Civil Internacional (OACI).
            </p>
            <div class="mt-4">
                <a href="{{ route('cuestionarios.index') }}" class="btn btn-warning btn-lg font-weight-bold mr-2 text-dark shadow-sm">
                    <i class="fas fa-plane-departure mr-2"></i> Presentar Examen de Vuelo
                </a>
                <a href="{{ route('questions.index') }}" class="btn btn-outline-light btn-lg font-weight-bold">
                    <i class="fas fa-database mr-2"></i> Explorar Banco de Preguntas
                </a>
            </div>
        </div>
    </div>

    <!-- Academic & Regulatory Pillars -->
    <div class="row text-center mb-5">
        <div class="col-md-4 mb-4">
            <div class="card card-falcon h-100 p-4">
                <div class="text-primary mb-3">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                </div>
                <h4 class="font-weight-bold">Piloto Comercial (PCA)</h4>
                <p class="text-muted small">
                    Evaluación exhaustiva de radioayudas avanzadas, navegación IFR, meteorología de altura, cálculo de peso y balance, y rendimiento de aeronaves multimotor.
                </p>
                <div class="mt-auto">
                    <span class="badge badge-primary">Umbral RAC: 75% Mínimo</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-falcon h-100 p-4">
                <div class="text-warning mb-3">
                    <i class="fas fa-compass fa-3x"></i>
                </div>
                <h4 class="font-weight-bold">Piloto Privado (PPA)</h4>
                <p class="text-muted small">
                    Fundamentos de vuelo visual (VFR), aerodinámica básica, reglamentación aérea general, espacio aéreo controlado y procedimientos de emergencia en cabina.
                </p>
                <div class="mt-auto">
                    <span class="badge badge-warning text-dark">Certificación Inicial</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-falcon h-100 p-4">
                <div class="text-info mb-3">
                    <i class="fas fa-broadcast-tower fa-3x"></i>
                </div>
                <h4 class="font-weight-bold">Despacho y CRM</h4>
                <p class="text-muted small">
                    Gestión de Recursos en Cabina (CRM), análisis de boletines meteorológicos METAR/TAF, planes de vuelo ATS y reglamentos aeronáuticos de Colombia.
                </p>
                <div class="mt-auto">
                    <span class="badge badge-info">Sistemas y Operaciones</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Information Banner -->
    <div class="card card-falcon mb-5">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h5 class="font-weight-bold text-dark mb-1">
                        <i class="fas fa-shield-alt text-warning mr-2"></i> Estándar de Certificación Aeronáutica UAEAC
                    </h5>
                    <p class="text-muted mb-0 small">
                        Para obtener la certificación de aptitud teórica ante la autoridad aeronáutica colombiana, el estudiante piloto debe alcanzar una calificación igual o superior al <strong>75.0%</strong> de respuestas correctas en cada una de las materias evaluadas.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
                    <a href="{{ route('cuestionarios.index') }}" class="btn btn-falcon-primary btn-block">
                        <i class="fas fa-arrow-right mr-1"></i> Ir al Listado de Exámenes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
