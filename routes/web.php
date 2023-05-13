<?php

use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/cuestionario', [App\Http\Controllers\CuestionarioController::class, 'index'])->name('cuestionario');

Route::get('/peliculas', function () {
    return view('peliculas');
})->name('peliculas');

Route::get('/detalles', function () {
    return view('detalles');
})->name('detalles');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('guest');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

