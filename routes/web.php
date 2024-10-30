<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\IngredientController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'admin'])->name('admin.index');

Route::get('/food', [FoodController::class, 'index'])->name('food.index');
Route::post('/food', [FoodController::class, 'store'])->name('food.store');
Route::put('/food/{food}', [FoodController::class, 'update'])->name('food.update');
Route::delete('/food/{food}', [FoodController::class, 'delete'])->name('food.delete');

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'delete'])->name('ingredients.delete');
