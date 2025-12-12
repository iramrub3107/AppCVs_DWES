@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar a {{ $alumno->nombre }} {{ $alumno->apellidos }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('alumnos.update', $alumno) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-file-earmark-pdf me-2 text-danger"></i> 
                                Subir PDF (opcional)
                            </label>
                            <input type="file" name="cv_pdf" class="form-control" accept="application/pdf">
                            
                            @if($alumno->cv_pdf)
                                <div class="mt-3 p-3 bg-light rounded">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="bi bi-file-earmark-pdf text-danger fs-4 me-2"></i>
                                            <span class="fw-medium">PDF actual:</span> 
                                            <a href="{{ asset('storage/' . $alumno->cv_pdf) }}" target="_blank" class="text-primary">
                                                curriculum_{{ $alumno->id }}.pdf
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ asset('storage/' . $alumno->cv_pdf) }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletePdfModal">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <small class="text-muted d-block mt-2">
                                <i class="bi bi-info-circle me-1"></i> 
                                Solo se puede subir un PDF de 2MB como mucho. Puedes subir uno o eliminar el actual.
                            </small>
                        </div>

                        <div class="modal fade" id="deletePdfModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Eliminar PDF</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Estás seguro de que quieres eliminar el PDF actual? Esta acción no se puede deshacer.</p>
                                        <div class="form-check mt-3">
                                            <input type="checkbox" class="form-check-input" id="eliminar_cv" name="eliminar_cv" value="1">
                                            <label class="form-check-label" for="eliminar_cv">
                                                Confirmo que quiero eliminar el PDF
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i> Actualizar Alumno
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection