<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('about', [MainController::class, 'about'])->name('about');
Route::get('array', [MainController::class, 'array'])->name('array');
Route::get('a/r/r/a/y', [MainController::class, 'array'])->name('array');
//Route::get('aboutRuta', [MainController::class, 'aboutMetodo'])->name('aboutNombre');
Route::get('portfolio', [MainController::class, 'portfolio'])->name('portfolio');

//las 7 rutas
Route::get('alumno/create', [AlumnoController::class, 'create'])->name('alumno.create');
Route::post('alumno', [AlumnoController::class, 'store'])->name('alumno.store');
//Route::get('alumno/edit', [AlumnoController::class, 'edit'])->name('alumno.edit');
//Route::get('alumno', [AlumnoController::class, 'index'])->name('alumno.index');
//Route::put('alumno', [AlumnoController::class, 'update'])->name('alumno.update');