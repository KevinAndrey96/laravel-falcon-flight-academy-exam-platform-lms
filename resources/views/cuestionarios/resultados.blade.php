@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <!-- Score Header Banner -->
    <div class="card card-falcon mb-4">
        <div class="card-body p-4 text-center {{ $passed ? 'bg-success text-white' : 'bg-danger text-white' }}" style="border-radius: 12px 12px 0 0;">
            <div class="mb-3">
                @if($passed)
                    <i class="fas fa-award fa-4x text-warning"></i>
                    <h2 class="font-weight-bold mt-2">¡EXAMEN APROBADO!</h2>
                    <p class="lead mb-0">El estudiante cumple satisfactoriamente el estándar de aptitud técnica teórica de la UAEAC.</p>
                @else
                    <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                    <h2 class="font-weight-bold mt-2">EXAMEN NO APROBADO</h2>
                    <p class="lead mb-0">La calificación obtenida es inferior al umbral mínimo reglamentario del 75.0%.</p>
                @endif
            </div>
            <div class="d-inline-block bg-white text-dark py-2 px-4 rounded-pill font-weight-bold shadow-sm">
                Cuestionario: {{ $title }}
            </div>
        </div>

        <!-- Metrics Grid -->
        <div class="card-body p-4 bg-white">
            <div class="row text-center">
                <div class="col-6 col-md-3 mb-3 mb-md-0 border-right">
                    <div class="text-muted small text-uppercase font-weight-bold">Calificación Final</div>
                    <div class="display-4 font-weight-bold {{ $passed ? 'text-success' : 'text-danger' }}">
                        {{ $scorePercentage }}%
                    </div>
                    <small class="text-muted">Escala 0 a 100%</small>
                </div>

                <div class="col-6 col-md-3 mb-3 mb-md-0 border-right">
                    <div class="text-muted small text-uppercase font-weight-bold">Respuestas Correctas</div>
                    <div class="display-4 font-weight-bold text-success">
                        {{ $correctCount }}
                    </div>
                    <small class="text-muted">de {{ $totalQuestions }} preguntas</small>
                </div>

                <div class="col-6 col-md-3 mb-3 mb-md-0 border-right">
                    <div class="text-muted small text-uppercase font-weight-bold">Respuestas Incorrectas</div>
                    <div class="display-4 font-weight-bold text-danger">
                        {{ $incorrectCount + $unansweredCount }}
                    </div>
                    <small class="text-muted">({{ $unansweredCount }} sin responder)</small>
                </div>

                <div class="col-6 col-md-3">
                    <div class="text-muted small text-uppercase font-weight-bold">Umbral Aprobatorio</div>
                    <div class="display-4 font-weight-bold text-primary">
                        75.0%
                    </div>
                    <small class="text-muted">Estándar RAC / UAEAC</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Breakdown -->
    @if(!empty($areaStats))
        <div class="card card-falcon mb-4">
            <div class="card-header font-weight-bold">
                <i class="fas fa-chart-pie mr-2 text-warning"></i> Desempeño por Área de Conocimiento Aeronáutico
            </div>
            <div class="card-body p-4">
                <div class="row">
                    @foreach($areaStats as $areaName => $stats)
                        <div class="col-md-6 mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="font-weight-bold text-dark">{{ $areaName }}</span>
                                <span class="small font-weight-bold {{ $stats['percentage'] >= 75 ? 'text-success' : 'text-danger' }}">
                                    {{ $stats['correct'] }} / {{ $stats['total'] }} ({{ $stats['percentage'] }}%)
                                </span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar {{ $stats['percentage'] >= 75 ? 'bg-success' : 'bg-danger' }}" 
                                     role="progressbar" 
                                     style="width: {{ $stats['percentage'] }}%;" 
                                     aria-valuenow="{{ $stats['percentage'] }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Detailed Review List -->
    <div class="card card-falcon mb-4">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <span><i class="fas fa-tasks mr-2 text-warning"></i> Revisión Detallada Ítem por Ítem</span>
            <span class="badge badge-light text-dark font-weight-normal">{{ count($detailedResults) }} ítems evaluados</span>
        </div>
        <div class="card-body p-4">
            @foreach($detailedResults as $idx => $item)
                <div class="p-3 mb-3 rounded border {{ $item['is_correct'] ? 'border-success bg-light' : 'border-danger bg-light' }}">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="font-weight-bold text-dark">
                            Pregunta {{ $idx + 1 }}
                            <span class="badge badge-secondary ml-2">{{ $item['area'] }}</span>
                        </span>
                        @if($item['is_correct'])
                            <span class="badge badge-success px-3 py-1"><i class="fas fa-check mr-1"></i> Correcta</span>
                        @else
                            <span class="badge badge-danger px-3 py-1"><i class="fas fa-times mr-1"></i> Incorrecta</span>
                        @endif
                    </div>

                    <p class="mb-2 text-dark font-weight-bold">{{ $item['question'] }}</p>

                    <div class="small">
                        <div class="mb-1">
                            <span class="text-muted font-weight-bold">Tu respuesta:</span>
                            @if($item['selected_option'])
                                <span class="{{ $item['is_correct'] ? 'text-success font-weight-bold' : 'text-danger font-weight-bold' }}">
                                    [{{ $item['selected_option'] }}] {{ $item['selected_text'] ?? 'Opción ' . $item['selected_option'] }}
                                </span>
                            @else
                                <span class="text-warning font-weight-bold">Sin respuesta</span>
                            @endif
                        </div>
                        @if(!$item['is_correct'])
                            <div>
                                <span class="text-muted font-weight-bold">Respuesta correcta oficial:</span>
                                <span class="text-success font-weight-bold">
                                    [{{ $item['correct_option'] }}] {{ $item['correct_text'] ?? 'Opción ' . $item['correct_option'] }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bottom Actions -->
    <div class="text-center">
        <a href="{{ route('cuestionarios.index') }}" class="btn btn-falcon-primary mr-2">
            <i class="fas fa-arrow-left mr-1"></i> Presentar Otro Examen
        </a>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary mr-2">
            <i class="fas fa-home mr-1"></i> Ir al Panel
        </a>
        <button onclick="window.print();" class="btn btn-warning font-weight-bold text-dark">
            <i class="fas fa-print mr-1"></i> Imprimir Boletín Oficial
        </button>
    </div>
</div>
@endsection
