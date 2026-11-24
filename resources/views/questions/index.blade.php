@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h2 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-database text-warning mr-2"></i> Banco de Preguntas Aeronáuticas
            </h2>
            <p class="text-muted mb-0 small">
                Gestión de ítems, reactivos de examen y opciones de respuesta para certificación de pilotos.
            </p>
        </div>
        <div class="mt-2 mt-md-0">
            <a href="{{ route('questions.create') }}" class="btn btn-falcon-gold font-weight-bold">
                <i class="fas fa-plus mr-1"></i> Nueva Pregunta
            </a>
            <a href="{{ route('cuestionarios.index') }}" class="btn btn-falcon-primary font-weight-bold ml-2">
                <i class="fas fa-play mr-1"></i> Probar Cuestionarios
            </a>
        </div>
    </div>

    <div class="card card-falcon">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Listado de Ítems Registrados</span>
            <span class="badge badge-light text-dark font-weight-normal">{{ $questions->count() }} preguntas</span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th style="width: 200px;">Cuestionario</th>
                            <th style="width: 180px;">Área Técnica</th>
                            <th>Pregunta</th>
                            <th style="width: 80px;" class="text-center">Respuesta</th>
                            <th style="width: 140px;" class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td><span class="badge badge-info">{{ $question->title }}</span></td>
                                <td><span class="badge badge-secondary">{{ $question->area }}</span></td>
                                <td class="small font-weight-bold">{{ $question->question }}</td>
                                <td class="text-center">
                                    <span class="badge badge-success px-2 py-1">{{ $question->answer }}</span>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-outline-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('¿Confirma la eliminación de esta pregunta?');" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No hay preguntas registradas en el banco de ítems.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
