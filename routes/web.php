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

Route::get('/add_book', [AdminController::class, 'add_book'])->name('add_book');
Route::post('/store_book', [AdminController::class, 'store_book'])->name('store_book');
Route::get('/show_book', [AdminController::class, 'show_book'])->name('show_book');
Route::get('/edit_book/{id}', [AdminController::class, 'edit_book'])->name('edit_book');
Route::post('/update_book/{id}', [AdminController::class, 'update_book'])->name('update_book');
Route::get('/delete_book/{id}', [AdminController::class, 'delete_book'])->name('delete_book');

Route::get('/borrow_request', [AdminController::class, 'borrow_request'])->name('borrow_request');
Route::post('/update_borrow/{id}', [AdminController::class, 'update_borrow'])->name('update_borrow');
Route::post('/return_borrow/{id}', [AdminController::class, 'return_borrow'])->name('return_borrow');
Route::post('/rejected_borrow/{id}', [AdminController::class, 'rejected_borrow'])->name('rejected_borrow');


Route::get('/borrow_book/{id}', [HomeController::class, 'borrow_books'])->name('borrow_books');
Route::get('/book_history', [HomeController::class, 'book_history'])->name('book_history');