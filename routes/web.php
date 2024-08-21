<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\RoomsController;


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

// Ruta para registrar usuarios (store method)

Route::post('/registro_peliculas', [MoviesController::class, 'store']);

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas RESTful para ventas de películas
Route::resource('sales', SalesController::class);

// Rutas RESTful para salas
Route::resource('rooms', RoomsController::class);

// Rutas RESTful para películas
Route::resource('movies', MoviesController::class);





