<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoUfController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\CicloModuloController;
use App\Http\Controllers\CicloUsuarioController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\UfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginWithGoogleController;

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

Route::get('/', [HomeController::class, 'index'])->name('indexHome');

Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/menu', [UserController::class, 'index'])->name('menu');
    Route::get('/menu/user', [UserController::class, 'indexProfesores'])->name('userIndex');
    Route::post('/menu/user/store', [UserController::class, 'store'])->name('storeUser');
    Route::get('/menu/user/edit/{id?}', [UserController::class, 'edit'])->name('editUser');
    Route::put('/menu/user/edit/{id?}', [UserController::class, 'update'])->name('updateUser');
    Route::get('/menu/user/show/{id?}', [UserController::class, 'show'])->name('showUser');
    Route::get('/menu/user/borrar/{id?}', [UserController::class, 'destroy'])->name('destroyUser');

    Route::get('/menu/alumno', [AlumnoController::class, 'index'])->name('alumnoIndex');
    Route::post('/menu/alumno/store', [AlumnoController::class, 'store'])->name('storeAlumno');
    Route::get('/menu/alumno/edit/{id?}', [AlumnoController::class, 'edit'])->name('editAlumno');
    Route::put('/menu/alumno/edit/{id?}', [AlumnoController::class, 'update'])->name('updateAlumno');
    Route::get('/menu/alumno/show/{id?}', [AlumnoController::class, 'show'])->name('showAlumno');
    Route::get('/menu/alumno/borrar/{id?}', [AlumnoController::class, 'destroy'])->name('destroyAlumno');

    Route::get('/menu/ciclo', [CicloController::class, 'index'])->name('cicloIndex');
    Route::post('/menu/ciclo/store', [CicloController::class, 'store'])->name('storeCiclo');
    Route::get('/menu/ciclo/edit/{id?}', [CicloController::class, 'edit'])->name('editCiclo');
    Route::put('/menu/ciclo/edit/{id?}', [CicloController::class, 'update'])->name('updateCiclo');
    Route::get('/menu/ciclo/show/{id?}', [CicloController::class, 'show'])->name('showCiclo');
    Route::get('/menu/ciclo/borrar/{id?}', [CicloController::class, 'destroy'])->name('destroyCiclo');

    Route::get('/menu/modulo', [ModuloController::class, 'index'])->name('moduloIndex');
    Route::post('/menu/modulo/store', [ModuloController::class, 'store'])->name('storeModulo');
    Route::get('/menu/modulo/edit/{id?}', [ModuloController::class, 'edit'])->name('editModulo');
    Route::put('/menu/modulo/edit/{id?}', [ModuloController::class, 'update'])->name('updateModulo');
    Route::get('/menu/modulo/show/{id?}', [ModuloController::class, 'show'])->name('showModulo');
    Route::get('/menu/modulo/borrar/{id?}', [ModuloController::class, 'destroy'])->name('destroyModulo');
    
    Route::get('/menu/uf', [UfController::class, 'index'])->name('ufIndex');
    Route::post('/menu/uf/store', [UfController::class, 'store'])->name('storeUf');
    Route::get('/menu/uf/edit/{id?}', [UfController::class, 'edit'])->name('editUf');
    Route::put('/menu/uf/edit/{id?}', [UfController::class, 'update'])->name('updateUf');
    Route::get('/menu/uf/show/{id?}', [UfController::class, 'show'])->name('showUf');
    Route::get('/menu/uf/borrar/{id?}', [UfController::class, 'destroy'])->name('destroyUf');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('menu');
});