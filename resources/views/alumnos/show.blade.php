@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Alumno: {{ $alumno->name }}</div>
  <div class="card-body">
    <p><strong>Email:</strong> {{ $alumno->email }}</p>
    <p><strong>Tel:</strong> {{ $alumno->phone }}</p>
    <p>
      <strong>CV Subido:</strong> {{ $alumno->resume_file_path ? 'Sí' : 'No' }} <br>
      <strong>CV Generado:</strong> {{ $alumno->cv_generated_path ? 'Sí' : 'No' }}
    </p>
    @if($alumno->cv_generated_path)
      <a class="btn btn-primary" href="{{ url('/alumnos/'.$alumno->id.'/download/generated') }}">Descargar CV generado</a>
    @endif
  </div>
</div>
@endsection