@extends('layouts.app')

@section('content')
    <h2>Lista de CVs</h2>
    <div class="row mt-4">
        @forelse ($alumnos as $alumno)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($alumno->fotografia)
                        <img src="{{ asset('storage/' . $alumno->fotografia) }}" class="card-img-top" alt="Foto" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            Sin foto
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $alumno->nombre }} {{ $alumno->apellidos }}</h5>
                        <p class="card-text">
                            <strong>Email:</strong> {{ $alumno->correo }}<br>
                            <strong>Nota media:</strong> {{ $alumno->nota_media ?? 'N/A' }}
                        </p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                            <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar CV?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No hay CVs aún. <a href="{{ route('alumnos.create') }}">Crear uno</a>.</p>
        @endforelse
    </div>
@endsection