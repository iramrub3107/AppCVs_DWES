<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class AlumnoController extends Controller {

    public function index() {
        $alumnos = Alumno::latest()->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create() {
        return view('alumnos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email|unique:alumnos',
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date|before_or_equal:today',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'experiencia' => 'nullable|string',
            'formacion' => 'nullable|string',
            'habilidades' => 'nullable|string',
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('fotografia');

        // Subir foto si existe
        if ($request->hasFile('fotografia')) {
            $path = $request->file('fotografia')->store('fotos', 'public');
            $data['fotografia'] = $path;
        }

        Alumno::create($data);

        return redirect()->route('alumnos.index')->with('success', 'CV creado correctamente.');
    }

    public function show(Alumno $alumno) {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno) {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email|unique:alumnos,correo,' . $alumno->id,
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date|before_or_equal:today',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'experiencia' => 'nullable|string',
            'formacion' => 'nullable|string',
            'habilidades' => 'nullable|string',
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('fotografia');

        // Actualizar foto si se sube una nueva
        if ($request->hasFile('fotografia')) {
            // Eliminar foto anterior si existe
            if ($alumno->fotografia) {
                Storage::disk('public')->delete($alumno->fotografia);
            }
            $path = $request->file('fotografia')->store('fotos', 'public');
            $data['fotografia'] = $path;
        }

        $alumno->update($data);

        return redirect()->route('alumnos.show', $alumno)->with('success', 'CV actualizado correctamente.');
    }

    public function destroy(Alumno $alumno) {
        if ($alumno->fotografia) {
            Storage::disk('public')->delete($alumno->fotografia);
        }
        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'CV eliminado.');
    }
}