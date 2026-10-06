<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('about', [MainController::class, 'about'])->name('about');
Route::get('array', [MainController::class, 'array'])->name('array');
Route::get('a/r/r/a/y', [MainController::class, 'array'])->name('array');
//Route::get('aboutRuta', [MainController::class, 'aboutMetodo'])->name('aboutNombre');
Route::get('portfolio', [MainController::class, 'portfolio'])->name('portfolio');