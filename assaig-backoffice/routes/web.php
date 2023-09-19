<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProfesorController;
use \App\Http\Controllers\ReservaController;
use \App\Http\Controllers\FechaController;
use \App\Http\Controllers\AuthenticateController;
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
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout-post');

Route::post('/login', [AuthenticateController::class, 'login'])->name('login-post');
Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::middleware('auth:sanctum')->group(function () {

Route::resource('profesores', ProfesorController::class);
Route::resource('fechas', FechaController::class);
Route::resource('reservas', ReservaController::class);

Route::put('/confirmar-reserva/{id}', [ReservaController::class, 'confirmar'])->name('reservas.confirmar');
Route::get('/reservas-pendientes', [ReservaController::class, 'pendientes'])->name('reservas.pendientes');
Route::get('/reservas-fecha/{id}', [ReservaController::class, 'reservasFecha'])->name('reservas.reservasFecha');

Route::get('/fechas-profesor/{id}', [FechaController::class, 'fechasByProfesor'])->name('fechas.fechasByProfesor');
Route::get('/profesores-fecha/{id}', [ProfesorController::class, 'profesoresByFecha'])->name('profesores.profesoresByFecha');


});

Route::post('/fecha-menu-add', [FechaController::class, 'add_menu'])->name('fecha.add-menu');
Route::get('/fecha-menu-create/{id}', [FechaController::class, 'create_menu'])->name('fecha.create-menu');
