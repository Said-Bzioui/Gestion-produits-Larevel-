<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatigorieController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// ------------------------------------
Route::get('/', function () {
    return view('layout');
})->name('layout');

// Products Routs
Route::resource('produits', ProduitsController::class);
// Categories Routs
Route::resource('categories', CategoryController::class);
// Ingrédient Routs
Route::resource('ingredients', IngredientsController::class);



// ------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';