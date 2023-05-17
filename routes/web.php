<?php

use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikeController;
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

Route::get('/ultimosEstrenos', function () {
    return view('ultimosEstrenos');
})->name('ultimosEstrenos');

Route::get('/ultimosEstrenosS', function () {
    return view('ultimosEstrenosS');
})->name('ultimosEstrenosS');


Route::get('/seriesMejorValoradas', function () {
    return view('seriesMejorValoradas');
})->name('seriesMejorValoradas');

Route::get('/peliculasMejorValoradas', function () {
    return view('peliculasMejorValoradas');
})->name('peliculasMejorValoradas');



Route::get('/cuestionario', [App\Http\Controllers\CuestionarioController::class, 'index'])->name('cuestionario');


Route::get('/detalles', function () {
    return view('detalles');
})->name('detalles');

Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class, 'editPerfilview'])->name('editProfile');



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


//Admin->pasarle middleware de que solo administradores pueden entrar aqui

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/empty', [AdminController::class, 'show'])->name('admin.empty');
Route::get('/admin/{tabla}', [AdminController::class, 'show'])->name('admin.show');
Route::get('/admin/{tabla}/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/{tabla}', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{tabla}/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{tabla}/{id}', 'App\Http\Controllers\AdminController@update')->name('admin.update');
Route::delete('/admin/{tabla}/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/guardar-peliculas', [App\Http\Controllers\PeliculasController::class, 'guardarPeliculas'])->name('guardar.peliculas');


Route::post('/guardar-peliculas', [App\Http\Controllers\PeliculasController::class, 'guardarPeliculas'])->name('guardar.peliculas');

Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'editarPerfil'])->name('profile.edit');

Route::get('/formularios-guardados', [App\Http\Controllers\FormByUserSavedController::class, 'index'])->name('formularios.guardados');
