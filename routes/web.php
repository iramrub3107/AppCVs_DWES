<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CurriculumController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('alumnos', AlumnoController::class);

Route::get('curriculums/{alumno}', [CurriculumController::class, 'show'])
     ->name('curriculums.show');

Route::get('curriculums/{alumno}/pdf', [CurriculumController::class, 'downloadPdf'])
     ->name('curriculums.pdf.download');