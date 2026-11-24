@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar Profile Card -->
        <div class="col-lg-4 mb-4">
            <div class="card card-falcon text-center p-4">
                <div class="mb-3">
                    <div class="rounded-circle bg-dark text-warning d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; border: 3px solid #d97706;">
                        <i class="fas fa-user-astronaut"></i>
                    </div>
                </div>
                <h4 class="font-weight-bold mb-1">{{ auth()->user()->name }}</h4>
                <p class="text-muted small mb-2">{{ auth()->user()->email }}</p>
                <div>
                    <span class="badge badge-falcon">{{ auth()->user()->role ?? 'Piloto Estudiante' }}</span>
                </div>
                <hr>
                <div class="text-left small text-muted">
                    <p class="mb-1"><strong>Institución:</strong> Falcon Escuela de Aviación</p>
                    <p class="mb-1"><strong>Sede:</strong> Colombia (UAEAC Certified)</p>
                    <p class="mb-0"><strong>Estándar Mínimo:</strong> 75.0% de Aprobación</p>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Actions -->
        <div class="col-lg-8">
            <div class="card card-falcon mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-plane mr-2 text-warning"></i> Centro de Evaluación y Entrenamiento Teórico</span>
                    <span class="badge badge-light text-dark font-weight-normal">Portal Activo</span>
                </div>

                <div class="card-body p-4">
                    <p class="text-muted">
                        Bienvenido al portal académico de Falcon Escuela de Aviación. Desde este módulo puede acceder a los exámenes programados para su fase de entrenamiento, verificar calificaciones y revisar el banco de preguntas por áreas aeronáuticas.
                    </p>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="p-3 border rounded h-100 bg-light">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-primary mr-3"><i class="fas fa-file-signature fa-2x"></i></div>
                                    <div>
                                        <h6 class="font-weight-bold mb-0">Exámenes Teóricos</h6>
                                        <small class="text-muted">Cuestionarios de evaluación</small>
                                    </div>
                                </div>
                                <p class="small text-muted mb-3">Diligencie las pruebas de conocimiento técnico por fases y materias.</p>
                                <a href="{{ route('cuestionarios.index') }}" class="btn btn-falcon-primary btn-sm btn-block">
                                    <i class="fas fa-play mr-1"></i> Ver Cuestionarios
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 border rounded h-100 bg-light">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning mr-3"><i class="fas fa-layer-group fa-2x"></i></div>
                                    <div>
                                        <h6 class="font-weight-bold mb-0">Banco de Preguntas</h6>
                                        <small class="text-muted">Gestor de ítems aeronáuticos</small>
                                    </div>
                                </div>
                                <p class="small text-muted mb-3">Explore, agregue o edite preguntas con sus opciones y respuestas correctas.</p>
                                <a href="{{ route('questions.index') }}" class="btn btn-falcon-gold btn-sm btn-block">
                                    <i class="fas fa-database mr-1"></i> Administrar Banco
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info mt-3 mb-0 small">
                        <i class="fas fa-info-circle mr-1"></i>
                        <strong>Criterio de Evaluación Aeronáutica:</strong> Todo examen evalúa automáticamente el umbral mínimo del 75% establecido en los Reglamentos Aeronáuticos de Colombia (RAC) para la habilitación de pilotos.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
