<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\marcaController;

Route::get('/', function () {
    return view('template');
});

Route::view ('/panel', 'panel.index') ->name ('panel');



Route::resources([
    'categorias' => categoriaController::class,
    'marcas' => marcaController::class,
    'productos' => ProductoController::class,
    'clientes' => clienteController::class

]);

Route::get('/login', function () {
    return view('auth.login');
});

// Si no esta autorizado para poder hacer la solicitud y ver recurso
Route::get('/401', function () {
    return view('pages.401');
});

// No se encontró el recurso
Route::get('/404', function () {
    return view('pages.404');
});

// Errror del servidor
Route::get('/500', function () {
    return view('pages.500');
});


