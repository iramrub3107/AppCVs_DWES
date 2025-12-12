@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary fw-bold">
            <i class="bi bi-file-earmark-text me-2"></i> 
            Currículum de {{ $alumno->nombre }} {{ $alumno->apellidos }}
        </h1>
        <div class="d-flex gap-2">
            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar Perfil
            </a>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="text-center mb-4">
                @if($alumno->fotografia)
                    <img src="{{ asset('storage/' . $alumno->fotografia) }}" 
                         alt="Foto de {{ $alumno->nombre }}"
                         style="width: 220px; height: 220px; object-fit: cover; border: 5px solid #f8f9fa">
                @else
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-circle shadow-lg text-white"
                         style="width: 220px; height: 220px; font-size: 5rem;">
                        {{ substr($alumno->nombre, 0, 1) }}
                    </div>
                @endif
            </div>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">Datos Personales</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">Nombre completo:</span>
                            <span>{{ $alumno->nombre }} {{ $alumno->apellidos }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">Email:</span>
                            <span class="text-primary">{{ $alumno->correo }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">Teléfono:</span>
                            <span>{{ $alumno->telefono ?? 'No disponible' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">Fecha nacimiento:</span>
                            <span>{{ $alumno->fecha_nacimiento ? $alumno->fecha_nacimiento->format('d/m/Y') : 'No disponible' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">Nota media:</span>
                            <span class="text-success fw-bold">{{ $alumno->nota_media ?? 'No disponible' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- PDF Section -->
            @if($alumno->cv_pdf)
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-danger text-white py-3">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-file-earmark-pdf me-2"></i> 
                            PDF Adjunto
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 4rem;"></i>
                        </div>
                        <p class="fw-medium mb-3">PDF</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('curriculums.pdf.download', $alumno) }}" class="btn btn-danger btn-lg">
                                <i class="bi bi-download me-2"></i> Descargar PDF
                            </a>
                            <a href="{{ asset('storage/' . $alumno->cv_pdf) }}" target="_blank" class="btn btn-outline-danger">
                                <i class="bi bi-eye me-2"></i> Ver en navegador
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-8">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-info text-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-briefcase me-2"></i> 
                        Experiencia Profesional
                    </h5>
                </div>
                <div class="card-body">
                    @if($alumno->experiencia)
                        <div class="content-section">
                            {!! nl2br(e($alumno->experiencia)) !!}
                        </div>
                    @else
                        <p class="text-muted text-center py-4">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Este alumno no tiene experiencia profesional
                        </p>
                    @endif
                </div>
            </div>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-mortarboard me-2"></i> 
                        Formación
                    </h5>
                </div>
                <div class="card-body">
                    @if($alumno->formacion)
                        <div class="content-section">
                            {!! nl2br(e($alumno->formacion)) !!}
                        </div>
                    @else
                        <p class="text-muted text-center py-4">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Este alumno no tiene nada de formación registrada
                        </p>
                    @endif
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning py-3">
                    <h5 class="mb-0 fw-bold text-dark">
                        <i class="bi bi-stars me-2"></i> 
                        Soft y Hard Skills
                    </h5>
                </div>
                <div class="card-body">
                    @if($alumno->habilidades)
                        <div class="content-section">
                            {!! nl2br(e($alumno->habilidades)) !!}
                        </div>
                    @else
                        <p class="text-muted text-center py-4">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Este alumno no tiene habilidades anotadas
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .content-section {
        line-height: 1.8;
        font-size: 1.05rem;
        color: #495057;
    }
    .content-section p {
        margin-bottom: 1rem;
    }
    .shadow-sm {
        box-shadow: 0 4px 15px rgba(0,0,0,0.08) !important;
    }
</style>
@endsection