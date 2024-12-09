<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAct'])->name('loginAct');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
    Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
