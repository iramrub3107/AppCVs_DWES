<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class AlumnoController extends Controller {

    public function index() {
        $alumnos = Alumno::orderBy('created_at', 'desc')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create() {
        return view('alumnos.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'phone' => 'nullable|string|max:50',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120', 
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $storedPath = Storage::disk('private')->putFile('uploads', $file);
            $resumePath = $storedPath;
        }

        $alumno = Alumno::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'resume_file_path' => $resumePath,
        ]);

        $pdf = PDF::loadView('alumnos.cv', compact('alumno'));
        $pdfFileName = 'cv_'.$alumno->id.'_'.time().'.pdf';
        $pdfPath = 'cvs/' . $pdfFileName;

        Storage::disk('private')->put($pdfPath, $pdf->output());

        $alumno->update([
            'cv_generated_path' => $pdfPath,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado y CV generado correctamente.');
    }

    public function show(Alumno $alumno) {
        return view('alumnos.show', compact('alumno'));
    }

    public function download(Request $request, Alumno $alumno, $type) {

        if ($type === 'original' && $alumno->resume_file_path) {
            $path = $alumno->resume_file_path;
        } elseif ($type === 'generated' && $alumno->cv_generated_path) {
            $path = $alumno->cv_generated_path;
        } else {
            abort(404);
        }

        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        $fullPath = Storage::disk('private')->path($path);
        return response()->download($fullPath);
    }
}
