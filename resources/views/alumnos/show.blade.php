@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>CV de {{ $alumno->nombre }} {{ $alumno->apellidos }}</h2>
        <div>
            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 text-center">
            @if($alumno->fotografia)
                <img src="{{ asset('storage/' . $alumno->fotografia) }}" class="img-fluid rounded" alt="Foto" style="max-height: 250px;">
            @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="height: 250px; width: 100%;">
                    Sin foto
                </div>
            @endif
        </div>
        <div class="col-md-9">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nombre:</strong> {{ $alumno->nombre }} {{ $alumno->apellidos }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $alumno->correo }}</li>
                <li class="list-group-item"><strong>Teléfono:</strong> {{ $alumno->telefono ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento ? $alumno->fecha_nacimiento->format('d/m/Y') : 'N/A' }}</li>
                <li class="list-group-item"><strong>Nota media:</strong> {{ $alumno->nota_media ?? 'N/A' }}</li>
            </ul>

            <h5 class="mt-4">Experiencia</h5>
            <p>{{ $alumno->experiencia ?? 'Sin experiencia registrada.' }}</p>

            <h5>Formación</h5>
            <p>{{ $alumno->formacion ?? 'Sin formación registrada.' }}</p>

            <h5>Habilidades</h5>
            <p>{{ $alumno->habilidades ?? 'Sin habilidades registradas.' }}</p>
        </div>
    </div>
@endsection