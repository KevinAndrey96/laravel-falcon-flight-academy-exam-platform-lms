@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-falcon">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-edit mr-2 text-warning"></i> Editar Pregunta Aeronáutica #{{ $questions->id }}</span>
                    <a href="{{ route('questions.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Volver al Banco
                    </a>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('questions.update', $questions->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="title" class="font-weight-bold">Nombre del Cuestionario / Examen: <span class="text-danger">*</span></label>
                                <input class="form-control @error('title') is-invalid @enderror" 
                                       required 
                                       name="title" 
                                       type="text" 
                                       id="title" 
                                       value="{{ old('title', $questions->title) }}">
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="area" class="font-weight-bold">Área Técnica Aeronáutica: <span class="text-danger">*</span></label>
                                <input class="form-control @error('area') is-invalid @enderror" 
                                       required 
                                       name="area" 
                                       type="text" 
                                       id="area" 
                                       value="{{ old('area', $questions->area) }}">
                                @error('area')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="question" class="font-weight-bold">Enunciado de la Pregunta: <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('question') is-invalid @enderror" 
                                      required 
                                      rows="3" 
                                      name="question" 
                                      id="question">{{ old('question', $questions->question) }}</textarea>
                            @error('question')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer" class="font-weight-bold text-success">
                                <i class="fas fa-check-circle mr-1"></i> Opción Correcta (Clave de Calificación): <span class="text-danger">*</span>
                            </label>
                            <select class="form-control border-success font-weight-bold @error('answer') is-invalid @enderror" required name="answer" id="answer">
                                @foreach(['A', 'B', 'C', 'D', 'E'] as $letter)
                                    <option value="{{ $letter }}" {{ old('answer', $questions->answer) === $letter ? 'selected' : '' }}>
                                        Opción {{ $letter }}
                                    </option>
                                @endforeach
                            </select>
                            @error('answer')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card p-3 bg-light mb-4">
                            <h6 class="font-weight-bold text-dark mb-3"><i class="fas fa-list-ul mr-1"></i> Alternativas de Respuesta</h6>
                            
                            <div class="form-group">
                                <label for="optionA" class="font-weight-bold">Opción A: <span class="text-danger">*</span></label>
                                <input class="form-control" required name="optionA" type="text" id="optionA" value="{{ old('optionA', $questions->optionA) }}">
                            </div>

                            <div class="form-group">
                                <label for="optionB" class="font-weight-bold">Opción B:</label>
                                <input class="form-control" name="optionB" type="text" id="optionB" value="{{ old('optionB', $questions->optionB) }}">
                            </div>

                            <div class="form-group">
                                <label for="optionC" class="font-weight-bold">Opción C:</label>
                                <input class="form-control" name="optionC" type="text" id="optionC" value="{{ old('optionC', $questions->optionC) }}">
                            </div>

                            <div class="form-group">
                                <label for="optionD" class="font-weight-bold">Opción D:</label>
                                <input class="form-control" name="optionD" type="text" id="optionD" value="{{ old('optionD', $questions->optionD) }}">
                            </div>

                            <div class="form-group">
                                <label for="optionE" class="font-weight-bold">Opción E:</label>
                                <input class="form-control" name="optionE" type="text" id="optionE" value="{{ old('optionE', $questions->optionE) }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('questions.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                            <button type="submit" class="btn btn-falcon-primary font-weight-bold px-4">
                                <i class="fas fa-save mr-1"></i> Actualizar Pregunta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
