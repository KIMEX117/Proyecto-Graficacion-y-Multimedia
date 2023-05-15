<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*~~~~~~~~~~~~~~~~~~~~~*/
/*     LANDING PAGE    */
/*~~~~~~~~~~~~~~~~~~~~~*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return redirect('/');
})->name('welcome');

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*     LOGIN - INICIAR SESIÓN    */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*     SIGN UP - REGISTRARSE    */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*     RUTAS USUARIO LOGEADO    */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

Route::middleware(['auth'])->group(function() {

    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    /*     HOME - ESPACIO DE TRABAJOS DEL USUARIO (Mis diseños)    */
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    Route::get('/home', function () {
        return view('users.home');
    })->name('home');

    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    /*     PROJECT - PÁGINA DE PROYECTO    */
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    Route::get('/project', function () {
        return view('designs.create');
    })->name('project');

});

// USERS - USUARIOS
Route::post('/user', [UserController::class,'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class,'update'])->name('user.update');
Route::get('/user/{id}/delete', [UserController::class,'destroy'])->name('user.destroy');

//DESIGNS - DISEÑOS
