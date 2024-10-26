<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\compraController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\roleController;
// use App\Http\Controllers\SearchController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ventaController;


// Route::get('/', function () {
//     return redirect()->route('login');
// })->middleware('guest'); 

// pasar ruta de inicio de sesion al principio?


Route::get('/', [homeController::class, 'index'])->name('panel');
// Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::view('/terminos', 'legal.terminos')->name('terminos');
Route::view('/privacidad', 'legal.privacidad')->name('privacidad');
Route::view('/primerosPasos', 'primerosPasos.index')->name('primerosPasos');



Route::resources([
    'categorias' => categoriaController::class,
    'marcas' => marcaController::class,
    'productos' => ProductoController::class,
    'clientes' => clienteController::class,
    'proveedores' => proveedorController::class,
    'compras' => compraController::class,
    'ventas' => ventaController::class,
    'users' => userController::class,
    'roles' => roleController::class,
    'profile' => profileController::class

]);

Route::get('/login',[loginController::class,'index'])->name('login');
Route::post('/login',[loginController::class,'login']);
Route::get('/logout',[logoutController::class,'logout'])->name('logout');

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


