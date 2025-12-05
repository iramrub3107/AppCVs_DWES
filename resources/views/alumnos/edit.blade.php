@extends('layouts.app')

@section('content')
    <h2>{{ isset($alumno) ? 'Editar CV' : 'Crear nuevo CV' }}</h2>

    <form action="{{ isset($alumno) ? route('alumnos.update', $alumno) : route('alumnos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($alumno))
            @method('PUT')
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nombre *</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre ?? '') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Apellidos *</label>
                    <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $alumno->apellidos ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Correo *</label>
                    <input type="email" name="correo" class="form-control" value="{{ old('correo', $alumno->correo ?? '') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $alumno->telefono ?? '') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nota media (0–10)</label>
                    <input type="number" step="0.01" min="0" max="10" name="nota_media" class="form-control" value="{{ old('nota_media', $alumno->nota_media ?? '') }}">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Experiencia (texto libre)</label>
            <textarea name="experiencia" class="form-control" rows="3">{{ old('experiencia', $alumno->experiencia ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Formación (texto libre)</label>
            <textarea name="formacion" class="form-control" rows="3">{{ old('formacion', $alumno->formacion ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Habilidades (separadas por comas o texto)</label>
            <textarea name="habilidades" class="form-control" rows="2">{{ old('habilidades', $alumno->habilidades ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto de perfil (opcional)</label>
            <input type="file" name="fotografia" class="form-control" accept="image/*">
            @if(isset($alumno) && $alumno->fotografia)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $alumno->fotografia) }}" alt="Foto actual" width="100">
                </div>
            @endif
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">{{ isset($alumno) ? 'Actualizar CV' : 'Crear CV' }}</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection