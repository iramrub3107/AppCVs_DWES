@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar al alumno {{ $alumno->nombre }} {{ $alumno->apellidos }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('alumnos.update', $alumno) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Sección 1: Datos personales -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nombre *</label>
                                    <input type="text" name="nombre" class="form-control" 
                                           value="{{ old('nombre', $alumno->nombre) }}" required>
                                    @error('nombre')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Apellidos *</label>
                                    <input type="text" name="apellidos" class="form-control" 
                                           value="{{ old('apellidos', $alumno->apellidos) }}" required>
                                    @error('apellidos')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Correo electrónico *</label>
                                    <input type="email" name="correo" class="form-control" 
                                           value="{{ old('correo', $alumno->correo) }}" required>
                                    @error('correo')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" 
                                           value="{{ old('telefono', $alumno->telefono) }}">
                                    @error('telefono')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Fecha de nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control" 
                                           value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento ? $alumno->fecha_nacimiento->format('Y-m-d') : '') }}">
                                    @error('fecha_nacimiento')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nota media (0-10)</label>
                                    <input type="number" step="0.01" min="0" max="10" name="nota_media" class="form-control" 
                                           value="{{ old('nota_media', $alumno->nota_media) }}">
                                    @error('nota_media')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección 2: Experiencia y formación -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Experiencia laboral</label>
                                    <textarea name="experiencia" class="form-control" rows="4">{{ old('experiencia', $alumno->experiencia) }}</textarea>
                                    <small class="text-muted">Ej: "2 años como desarrollador web en X empresa"</small>
                                    @error('experiencia')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Formación</label>
                                    <textarea name="formacion" class="form-control" rows="4">{{ old('formacion', $alumno->formacion) }}</textarea>
                                    <small class="text-muted">Ej: "Grado en Ingeniería Informática - UGR (2018-2022)"</small>
                                    @error('formacion')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección 3: Habilidades y foto -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Soft y Hard skills</label>
                                    <textarea name="habilidades" class="form-control" rows="3">{{ old('habilidades', $alumno->habilidades) }}</textarea>
                                    <small class="text-muted">No olvides separarlo por comas: ej: "PHP, Laravel, MySQL, JavaScript"</small>
                                    @error('habilidades')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Foto de perfil</label>
                                    <input type="file" name="fotografia" class="form-control" accept="image/*">
                                    
                                    @if($alumno->fotografia)
                                        <div class="mt-3 p-2 bg-light rounded text-center">
                                            <img src="{{ asset('storage/' . $alumno->fotografia) }}" 
                                                 alt="Foto actual" 
                                                 class="img-fluid rounded" 
                                                 style="max-height: 150px; object-fit: cover;">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="eliminar_foto" name="eliminar_foto" value="1">
                                                <label class="form-check-label" for="eliminar_foto">
                                                    Eliminar foto actual
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    @error('fotografia')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección 4: CV en PDF -->
                        <div class="mb-4 p-3 bg-light rounded border">
                            <h5 class="fw-bold text-danger mb-3">
                                <i class="bi bi-file-earmark-pdf me-2"></i> Currículum en PDF (opcional)
                            </h5>
                            
                            @if($errors->has('cv_pdf'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('cv_pdf') }}
                                </div>
                            @endif

                            <input type="file" name="cv_pdf" class="form-control" accept="application/pdf">
                            
                            @if($alumno->cv_pdf)
                                <div class="mt-3 p-3 bg-white rounded border">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="bi bi-file-earmark-pdf text-danger fs-4 me-2"></i>
                                            <span class="fw-medium">PDF actual:</span> 
                                            <a href="{{ asset('storage/' . $alumno->cv_pdf) }}" target="_blank" class="text-primary fw-bold">
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
                                Puedes subir o dejar un PDF de como mucho 2MB
                            </small>
                        </div>

                        <!-- Modal para confirmar eliminación de PDF -->
                        <div class="modal fade" id="deletePdfModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Eliminar PDF</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Estás seguro de que quieres borrar el currículum en PDF actual? Esta acción no se puede deshacer.</p>
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

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Volver a la lista
                            </a>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-check-circle"></i> Actualizar Alumno
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-label {
        color: #2d3748;
        font-size: 0.95rem;
    }
    .card {
        border-radius: 15px !important;
    }
    .card-header {
        border-radius: 15px 15px 0 0 !important;
    }
</style>
@endsection