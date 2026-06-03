<?php
use App\Http\Controllers\Api\ArticuloController;
use App\Http\Controllers\Api\CategoriaController;

Route::get('/api/categorias', [CategoriaController::class, 'index']);
Route::get('/api/articulos', [ArticuloController::class, 'index']);

