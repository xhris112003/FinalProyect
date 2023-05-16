<?php

use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('peliculas');
})->name('/');

Route::get('/quiz', function () {
    return view('quiz');
})->name('quiz');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/acercade', function () {
    return view('acercade');
})->name('acercade');

Route::get('/series', function () {
    return view('series');
})->name('series');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/cuestionario', [App\Http\Controllers\CuestionarioController::class, 'index'])->name('cuestionario');


Route::get('/detalles', function () {
    return view('detalles');
})->name('detalles');

Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class, 'editPerfilview'])->name('editProfile');



Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('guest');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/guardar-peliculas', [App\Http\Controllers\PeliculasController::class, 'guardarPeliculas'])->name('guardar.peliculas');


Route::post('/guardar-peliculas', [App\Http\Controllers\PeliculasController::class, 'guardarPeliculas'])->name('guardar.peliculas');

Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'editarPerfil'])->name('profile.edit');
