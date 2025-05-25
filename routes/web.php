<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [AdminController::class, 'index']);
Route::get('/categories_page', [AdminController::class, 'categories_page'])->name('categories_page');
Route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category');
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit_category');
Route::post('/update_category/{id}', [AdminController::class, 'update_category'])->name('update_category');
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('cat_delete');
