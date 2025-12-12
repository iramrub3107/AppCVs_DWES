<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::latest()->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email|unique:alumnos',
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'experiencia' => 'nullable|string',
            'formacion' => 'nullable|string',
            'habilidades' => 'nullable|string',
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_pdf' => 'nullable|file|mimes:pdf|max:2048', 
        ]);

        $data = $request->except(['fotografia', 'cv_pdf']);

        if ($request->hasFile('fotografia')) {
            $data['fotografia'] = $request->file('fotografia')->store('fotos', 'public');
        }

        if ($request->hasFile('cv_pdf')) {
            $data['cv_pdf'] = $request->file('cv_pdf')->store('cv_pdfs', 'public');
        }

        Alumno::create($data);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente.');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email|unique:alumnos,correo,'.$alumno->id,
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'experiencia' => 'nullable|string',
            'formacion' => 'nullable|string',
            'habilidades' => 'nullable|string',
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'eliminar_foto' => 'nullable|boolean',
            'eliminar_cv' => 'nullable|boolean',
        ]);

        $data = $request->except(['fotografia', 'cv_pdf', 'eliminar_foto', 'eliminar_cv']);

        if ($request->hasFile('fotografia')) {
            if ($alumno->fotografia && Storage::disk('public')->exists($alumno->fotografia)) {
                Storage::disk('public')->delete($alumno->fotografia);
            }
            $data['fotografia'] = $request->file('fotografia')->store('fotos', 'public');
        } elseif ($request->eliminar_foto) {
            if ($alumno->fotografia && Storage::disk('public')->exists($alumno->fotografia)) {
                Storage::disk('public')->delete($alumno->fotografia);
            }
            $data['fotografia'] = null;
        }

        if ($request->hasFile('cv_pdf')) {
            if ($alumno->cv_pdf && Storage::disk('public')->exists($alumno->cv_pdf)) {
                Storage::disk('public')->delete($alumno->cv_pdf);
            }
            $data['cv_pdf'] = $request->file('cv_pdf')->store('cv_pdfs', 'public');
        } elseif ($request->eliminar_cv) {
            if ($alumno->cv_pdf && Storage::disk('public')->exists($alumno->cv_pdf)) {
                Storage::disk('public')->delete($alumno->cv_pdf);
            }
            $data['cv_pdf'] = null;
        }

        $alumno->update($data);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy(Alumno $alumno)
    {
        if ($alumno->fotografia && Storage::disk('public')->exists($alumno->fotografia)) {
            Storage::disk('public')->delete($alumno->fotografia);
        }
        if ($alumno->cv_pdf && Storage::disk('public')->exists($alumno->cv_pdf)) {
            Storage::disk('public')->delete($alumno->cv_pdf);
        }
        
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado.');
    }
}