<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserForm;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/cuestionario', function () {
    return view('cuestionario');
})->name('cuestionario');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

