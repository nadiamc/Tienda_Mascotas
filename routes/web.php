<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\PetController; // 👈 Cambiamos esto para apuntar al controlador común

Route::get('/', function () {
    return 'OK';
});

Route::get('/api/categorias', [CategoriaController::class, 'index']);
Route::get('/api/articulos', [ArticuloController::class, 'index']);

// 👇 Tus rutas tradicionales para navegar las pantallas de Mascotas
Route::get('/mascotas', [PetController::class, 'index'])->name('pets.index');
Route::get('/mascotas/crear', [PetController::class, 'create'])->name('pets.create');
Route::post('/mascotas', [PetController::class, 'store'])->name('pets.store');