<?php

use App\Http\Controllers\EntidadController;
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
/* Route::post('update.entidad/{id}', [EntidadController::class, 'update'])->name('update.entidad'); */
Route::put('update.entidad/{entidad}', [EntidadController::class, 'update'])->name('update.entidad');
