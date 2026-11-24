@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h2 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-clipboard-list text-warning mr-2"></i> Cuestionarios y Exámenes Aeronáuticos
            </h2>
            <p class="text-muted mb-0 small">
                Seleccione el módulo de evaluación teórica a diligenciar. Las pruebas evalúan estándares de la UAEAC y OACI.
            </p>
        </div>
        <div class="mt-2 mt-md-0">
            <a href="{{ route('questions.create') }}" class="btn btn-falcon-gold btn-sm">
                <i class="fas fa-plus mr-1"></i> Nueva Pregunta al Banco
            </a>
        </div>
    </div>

    @if($cuestionarios->isEmpty())
        <div class="card card-falcon p-5 text-center">
            <div class="text-muted mb-3"><i class="fas fa-plane-slash fa-3x"></i></div>
            <h4 class="font-weight-bold">No hay cuestionarios registrados en el banco</h4>
            <p class="text-muted small">Cree nuevas preguntas asignando un título de cuestionario para comenzar.</p>
            <div class="mt-2">
                <a href="{{ route('questions.create') }}" class="btn btn-falcon-primary">
                    <i class="fas fa-plus-circle mr-1"></i> Crear Primera Pregunta
                </a>
            </div>
        </div>
    @else
        <div class="row">
            @foreach($cuestionarios as $cuestionario)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-falcon h-100 d-flex flex-column">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="text-truncate font-weight-bold" style="max-width: 200px;" title="{{ $cuestionario->title }}">
                                {{ $cuestionario->title }}
                            </span>
                            <span class="badge badge-warning text-dark">Aeronáutica</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between text-muted small mb-1">
                                    <span><i class="fas fa-question-circle mr-1 text-primary"></i> Total Preguntas:</span>
                                    <strong class="text-dark">{{ $cuestionario->total_questions }}</strong>
                                </div>
                                <div class="d-flex justify-content-between text-muted small mb-1">
                                    <span><i class="fas fa-layer-group mr-1 text-warning"></i> Áreas Técnicas:</span>
                                    <strong class="text-dark">{{ $cuestionario->total_areas }}</strong>
                                </div>
                                <div class="d-flex justify-content-between text-muted small mb-1">
                                    <span><i class="fas fa-tachometer-alt mr-1 text-danger"></i> Umbral UAEAC:</span>
                                    <strong class="text-success font-weight-bold">75.0%</strong>
                                </div>
                                <div class="d-flex justify-content-between text-muted small">
                                    <span><i class="fas fa-clock mr-1 text-info"></i> Tiempo Estimado:</span>
                                    <strong class="text-dark">{{ max(15, $cuestionario->total_questions * 2) }} min</strong>
                                </div>
                            </div>

                            <p class="text-muted small mb-4">
                                Evaluación de conocimientos para graduación y licenciamiento de pilotos en Falcon Escuela de Aviación.
                            </p>

                            <div class="mt-auto">
                                <a href="{{ route('cuestionarios.show', urlencode($cuestionario->title)) }}" class="btn btn-falcon-primary btn-block">
                                    <i class="fas fa-pen-alt mr-1"></i> Iniciar Examen
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
