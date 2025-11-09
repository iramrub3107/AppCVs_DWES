<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('alumnos.create');
});

Route::resource('alumnos', AlumnoController::class)->only(['create', 'store', 'show', 'index', 'download']);
