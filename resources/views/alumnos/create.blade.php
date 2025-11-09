@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Crear nuevo alumno</div>
  <div class="card-body">
    <form action="{{ route('alumnos.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Subir CV (PDF o DOC/DOCX)</label>
        <input type="file" name="resume" class="form-control">
        @error('resume')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <button class="btn btn-primary">Crear alumno & generar CV</button>
    </form>
  </div>
</div>
@endsection