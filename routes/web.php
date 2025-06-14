<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\Logoutcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;


// Route::middleware([
    //     'auth:sanctum',
    //     config('jetstream.auth_session'),
    //     'verified',
    //     ])->group(function () {
        //         Route::get('/',[HomeController::class, 'index']);
        //     });
        
Route::get('/', [HomeController::class, 'index']);
Route::get('/borrow_book/{id}', [HomeController::class, 'borrow_books'])->name('borrow_books');
Route::get('/book_history', [HomeController::class, 'book_history'])->name('book_history');
Route::get('/cancel_request/{id}', [HomeController::class, 'cancel_request'])->name('cancel_request');
Route::get('/explore', [HomeController::class, 'explore'])->name('explore');
Route::get('/book_details/{id}', [HomeController::class, 'book_details'])->name('detail');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/cat_search/{id}', [HomeController::class, 'category_search'])->name('category_search');
Route::post('/logout', [Logoutcontroller::class, 'store']);
    

Route::get('/home', [AdminController::class, 'index'])->middleware('admin');
Route::get('/categories_page', [AdminController::class, 'categories_page'])->name('categories_page')->middleware('admin');
Route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category')->middleware('admin');
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit_category')->middleware('admin');
Route::post('/update_category/{id}', [AdminController::class, 'update_category'])->name('update_category')->middleware('admin');
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('cat_delete')->middleware('admin');
        
Route::get('/add_book', [AdminController::class, 'add_book'])->name('add_book')->middleware('admin');
Route::post('/store_book', [AdminController::class, 'store_book'])->name('store_book')->middleware('admin');
Route::get('/show_book', [AdminController::class, 'show_book'])->name('show_book')->middleware('admin');
Route::get('/edit_book/{id}', [AdminController::class, 'edit_book'])->name('edit_book')->middleware('admin');
Route::post('/update_book/{id}', [AdminController::class, 'update_book'])->name('update_book')->middleware('admin');
Route::get('/delete_book/{id}', [AdminController::class, 'delete_book'])->name('delete_book')->middleware('admin');
    
Route::get('/borrow_request', [AdminController::class, 'borrow_request'])->name('borrow_request')->middleware('admin');
Route::post('/update_borrow/{id}', [AdminController::class, 'update_borrow'])->name('update_borrow')->middleware('admin');
Route::post('/return_borrow/{id}', [AdminController::class, 'return_borrow'])->name('return_borrow')->middleware('admin');
Route::post('/rejected_borrow/{id}', [AdminController::class, 'rejected_borrow'])->name('rejected_borrow')->middleware('admin');





