<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PetController; //  Apunta a la nueva ubicación

Route::get('/', function () {
    return 'OK';
});

Route::get('/api/categorias', [CategoriaController::class, 'index']);
Route::get('/api/articulos', [ArticuloController::class, 'index']);

// 👇 Tus nuevas rutas de la API para mascotas
Route::get('/api/mascotas', [PetController::class, 'index']);
Route::post('/api/mascotas', [PetController::class, 'store']);