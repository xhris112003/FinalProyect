<?php

use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserForm;



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


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('guest');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


//comprobar si el usuario está conectado
Route::get('/api/auth/check', function () {
    if (Auth::check()) {
      return response('', 200);
    } else {
      return response('', 401);
    }
  })->middleware('auth');

//guardar datos de formulario
Route::post('/saveForm', function (Request $request) {
    $userForm = new UserForm;
    $userForm->formdata = json_encode($request->all());
    $userForm->user_id = Auth::User()->id;
    $userForm->save();

    return response()->json(['mensaje' => 'Datos guardados correctamente']);
  });

