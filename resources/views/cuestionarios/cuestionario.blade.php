@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <!-- Exam Header Banner -->
    <div class="card card-falcon mb-4">
        <div class="card-body p-4 bg-light">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <span class="badge badge-falcon mb-2">Examen Oficial en Curso</span>
                    <h3 class="font-weight-bold text-dark mb-1">{{ $title }}</h3>
                    <p class="text-muted small mb-0">
                        Falcon Escuela de Aviación | Centro de Instrucción Aeronáutica UAEAC
                    </p>
                    <div class="mt-2">
                        @foreach($areas as $area)
                            <span class="badge badge-secondary mr-1">{{ $area }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                    <div class="d-inline-block text-left p-2 px-3 bg-white border rounded shadow-sm">
                        <div class="small text-muted text-uppercase font-weight-bold">Total Preguntas</div>
                        <div class="h4 font-weight-bold text-primary mb-0">{{ $questions->count() }} ítems</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Examination Form -->
    <form action="{{ route('cuestionarios.evaluar', urlencode($title)) }}" method="POST" id="examForm">
        @csrf

        @foreach($questions as $index => $q)
            <div class="card card-falcon mb-4">
                <div class="card-header d-flex justify-content-between align-items-center py-2 px-3">
                    <span class="font-weight-bold">
                        <i class="fas fa-question-circle mr-1 text-warning"></i> Pregunta {{ $index + 1 }} de {{ $questions->count() }}
                    </span>
                    <span class="badge badge-light text-dark font-weight-normal">
                        Área: <strong>{{ $q->area }}</strong>
                    </span>
                </div>

                <div class="card-body p-4">
                    <h5 class="font-weight-bold text-dark mb-4" style="line-height: 1.5;">
                        {{ $q->question }}
                    </h5>

                    <div class="list-group">
                        @foreach($q->options_map as $letter => $optionText)
                            <label class="list-group-item list-group-item-action d-flex align-items-center p-3 mb-2 rounded border option-label" style="cursor: pointer; transition: all 0.15s ease;">
                                <div class="custom-control custom-radio mr-3">
                                    <input type="radio" 
                                           id="q_{{ $q->id }}_{{ $letter }}" 
                                           name="answers[{{ $q->id }}]" 
                                           value="{{ $letter }}" 
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="q_{{ $q->id }}_{{ $letter }}"></label>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="badge badge-primary mr-2 px-2 py-1">{{ $letter }}</span>
                                    <span class="text-dark">{{ $optionText }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Submit Bar -->
        <div class="card card-falcon p-4 text-center bg-white shadow sticky-bottom" style="z-index: 100;">
            <div class="row align-items-center">
                <div class="col-md-8 text-md-left mb-3 mb-md-0">
                    <h6 class="font-weight-bold mb-1"><i class="fas fa-exclamation-circle text-warning mr-2"></i> Confirmación de Entrega de Examen</h6>
                    <small class="text-muted">Asegúrese de haber contestado todas las preguntas antes de finalizar. El resultado se calculará inmediatamente.</small>
                </div>
                <div class="col-md-4 text-md-right">
                    <button type="submit" class="btn btn-success btn-lg px-4 font-weight-bold" onclick="return confirm('¿Está seguro de enviar sus respuestas y finalizar el examen?');">
                        <i class="fas fa-paper-plane mr-2"></i> Finalizar y Calificar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .option-label:hover {
        background-color: #f1f5f9;
        border-color: #cbd5e1 !important;
    }
    .option-label input[type="radio"]:checked ~ .custom-control-label {
        font-weight: bold;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const labels = document.querySelectorAll('.option-label');
        labels.forEach(label => {
            label.addEventListener('click', function() {
                const radio = this.querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;
                    // Highlight selected label
                    const siblings = this.parentElement.querySelectorAll('.option-label');
                    siblings.forEach(s => s.classList.remove('bg-light', 'border-primary'));
                    this.classList.add('bg-light', 'border-primary');
                }
            });
        });
    });
</script>
@endsection
