<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CV Manager</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
            padding: 0;
            margin: 0;
            color: #333;
        }

        .hero {
            background: linear-gradient(rgba(25, 42, 86, 0.85), rgba(10, 25, 50, 0.9)), url('https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 6rem 1rem;
            text-align: center;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 3.2rem;
            margin-bottom: 1.2rem;
            text-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .hero p {
            font-size: 1.3rem;
            max-width: 700px;
            margin: 0 auto 2.5rem;
            opacity: 0.9;
        }

        .btn-primary-lg {
            background: #4361ee;
            color: black;
            text-decoration: none;
            border: none;
            padding: 0.9rem 2.5rem;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 6px 16px rgba(67, 97, 238, 0.4);
            transition: all 0.3s ease;
        }

        .btn-primary-lg i {
            margin-right: 1rem;
        }

        .btn-primary-lg:hover {
            background: #3a56e0;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.6);
        }

        /* Sección de características */
        .features {
            padding: 5rem 1rem;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 72px;
            height: 72px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: #4361ee;
        }

        .feature-card h3 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1e293b;
        }

        .feature-card p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 2rem 1rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2.3rem; }
            .hero p { font-size: 1.1rem; }
            .feature-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Gestor de CVs</h1>
            <p>Crea, edita y visualiza CVs de forma rápida, segura y 100% personalizable.</p>
            <a href="{{ route('alumnos.index') }}" class="btn btn-primary-lg">
                <i class="bi bi-file-earmark-text me-2"></i>Comenzar ahora
            </a>
        </div>
    </section>

    <!-- Features -->
    <section class="features">
        <div class="features-container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-pencil-fill"></i>
                        </div>
                        <h3>Fácil de usar</h3>
                        <p>Interfaz intuitiva: completa tu CV en menos de 5 minutos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h3>Seguro y privado</h3>
                        <p>Tus datos están protegidos y solo tú decides quién los ve.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-cloud-arrow-down"></i>
                        </div>
                        <h3>Exporta tu CV</h3>
                        <p>Próximamente: descarga en PDF, Word o imprime directamente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="container">
            <p class="mb-0">© {{ date('Y') }}</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>