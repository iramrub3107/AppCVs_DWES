@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Alumnos</div>
  <div class="card-body">
    <table class="table">
      <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>CV Subido</th><th>CV Generado</th><th>Acciones</th></tr></thead>
      <tbody>
        @foreach($alumnos as $s)
        <tr>
          <td>{{ $s->id }}</td>
          <td>{{ $s->name }}</td>
          <td>{{ $s->email }}</td>
          <td>{{ $s->resume_file_path ? 'Sí' : 'No' }}</td>
          <td>{{ $s->cv_generated_path ? 'Sí' : 'No' }}</td>
          <td>
            <a class="btn btn-sm btn-info" href="{{ route('alumnos.show', $s) }}">Ver</a>
            @if($s->resume_file_path)
              <a class="btn btn-sm btn-secondary" href="{{ url('/alumnos/'.$s->id.'/download/original') }}">Descargar original</a>
            @endif
            @if($s->cv_generated_path)
              <a class="btn btn-sm btn-primary" href="{{ url('/alumnos/'.$s->id.'/download/generated') }}">Descargar CV generado</a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection