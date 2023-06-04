<?php

use App\Http\Controllers\AutenticadorController;
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

Route::post('/login', [AutenticadorController::class, 'login'])
    ->name('autenticador.login');

Route::get('logout', [AutenticadorController::class, 'logout'])
    ->name('autenticador.logout')
    ->middleware('auth:sanctum');

