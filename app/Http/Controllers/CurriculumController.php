<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{
    public function show(Alumno $alumno)
    {
        return view('curriculums.show', compact('alumno'));
    }

    public function downloadPdf(Alumno $alumno)
    {
        if (!$alumno->cv_pdf) {
            abort(404, 'PDF no encontrado');
        }

        $path = storage_path('app/public/' . $alumno->cv_pdf);
        return response()->download($path, 'curriculum_' . $alumno->id . '.pdf');
    }
}