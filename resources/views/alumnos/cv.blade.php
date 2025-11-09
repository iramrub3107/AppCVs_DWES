<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; }
    .header { text-align: center; margin-bottom: 10px; }
    .section { margin-bottom: 8px; }
  </style>
</head>
<body>
  <div class="header">
    <h1>Currículum Vitae</h1>
    <h3>{{ $alumno->name }}</h3>
  </div>

  <div class="section">
    <strong>Contacto</strong><br>
    Email: {{ $alumno->email }}<br>
    Teléfono: {{ $alumno->phone ?? '—' }}
  </div>

  <div class="section">
    <strong>Notas</strong><br>
    Este CV fue generado automáticamente el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}.
  </div>

  <!-- Agrega aquí secciones (Educación, Experiencia, Habilidades) y adapta para usar datos reales -->
</body>
</html>