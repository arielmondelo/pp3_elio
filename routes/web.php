<?php

use App\Http\Controllers\EntidadController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\EntornoVirtualController;

use App\Http\Controllers\HomeController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Rutas para login y logout.

/* Route::post('/login', [AutenticadorController::class, 'login'])
    ->name('autenticador.login'); */

//Ruta para cerrar sesión. El middleware valida que esté autenticado el usuario.
/* Route::get('logout', [AutenticadorController::class, 'logout'])
    ->name('autenticador.logout')
    ->middleware('auth:sanctum'); */


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

/* Entidades */
Route::get('entidades.mostrar', [EntidadController::class, 'index'])->name('entidades.mostrar');
Route::post('/eliminarEntidad/{id}', [EntidadController::class, 'eliminarEntidad'])->name('eliminarEntidad');
Route::post('guardar.entidad', [EntidadController::class, 'store'])->name('guardar.entidad');
Route::post('update.entidad/{id}', [EntidadController::class, 'update'])->name('update.entidad');
/* Coordinador */
Route::get('coordinadores.mostrar', [CoordinadorController::class, 'index'])->name('coordinadores.mostrar');
Route::post('/eliminarCoordinador/{id}', [CoordinadorController::class, 'eliminarCoordinador'])->name('eliminarCoordinador');
Route::post('guardar.coordinador', [CoordinadorController::class, 'store'])->name('guardar.coordinador');
Route::post('update.coordinador/{id}', [CoordinadorController::class, 'update'])->name('update.coordinador');

/* Solicitud */
Route::get('solicitudes.mostrar', [SolicitudController::class, 'index'])->name('solicitudes.mostrar');
Route::post('/eliminarSolicitud/{id}', [SolicitudController::class, 'eliminarSolicitud'])->name('eliminarSolicitud');
Route::post('guardar.solicitud', [SolicitudController::class, 'store'])->name('guardar.solicitud');
Route::post('update.solicitud/{id}', [SolicitudController::class, 'update'])->name('update.solicitud');

/* Coordinador */
Route::get('entornoVirtual.mostrar', [EntornoVirtualController::class, 'index'])->name('entornoVirtual.mostrar');
Route::post('/eliminarEntornoVirtual/{id}', [EntornoVirtualController::class, 'eliminarEntornoVirtual'])->name('eliminarEntornoVirtual');
Route::post('guardar.entornoVirtual', [EntornoVirtualController::class, 'store'])->name('guardar.entornoVirtual');
Route::post('update.entornoVirtual/{id}', [EntornoVirtualController::class, 'update'])->name('update.entornoVirtual');