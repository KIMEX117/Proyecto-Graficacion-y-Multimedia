<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DesignController;
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

    //DESIGNS - DISEÑOS
    Route::get('/home', [DesignController::class, 'index'])->name('home');
    Route::get('/design', [DesignController::class,'create'])->name('design.create');
    Route::post('/design', [DesignController::class,'store'])->name('design.store');
    Route::get('/design/{id}/edit', [DesignController::class,'edit'])->name('design.edit');
    Route::put('/design/{id}', [DesignController::class,'update'])->name('design.update');
    Route::delete('/design/{id}', [DesignController::class,'destroy'])->name('design.delete');

});

// USERS - USUARIOS
Route::post('/user', [UserController::class,'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class,'update'])->name('user.update');
Route::get('/user/{id}/delete', [UserController::class,'destroy'])->name('user.destroy');

