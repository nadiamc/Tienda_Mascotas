<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\CategoriaController;

Route::get('/', function () {
    return 'OK';
});

Route::get('/api/categorias', [CategoriaController::class, 'index']);
Route::get('/api/articulos', [ArticuloController::class, 'index']);