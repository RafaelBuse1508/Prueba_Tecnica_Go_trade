<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstablecimientoController;

Route::get('/',[UsuarioController::class, 'index'])->name('principal');

Route::post('/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/agregar_establecimiento', [EstablecimientoController::class, 'index'])->name('agregar_establecimiento');
Route::post('/guardar_establecimiento', [EstablecimientoController::class, 'guardar'])->name('guardar_establecimiento');

Route::get('/listar_establecimiento', [EstablecimientoController::class, 'listar'])->name('listar_establecimiento');