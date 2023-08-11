<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstadopromocioneController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoClientController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/categorias', CategoriaController::class)->middleware('auth');
Route::resource('/productos', ProductoController::class)->middleware('auth');
Route::resource('/estadopromociones', EstadopromocioneController::class)->middleware('auth');


//rutas publicas
Route::resource('/productosC', ProductoClientController::class);
