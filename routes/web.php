<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'index']);
Route::get('/authors/{id}', [Controller::class, 'getAuthor'])->name('getAuthor');;
Route::get('/authors', [Controller::class, 'authorsList'])->name('authorsList');;
Route::get('/books/{id}', [Controller::class, 'getBook'])->name('getBook');;
Route::get('/books', [Controller::class, 'booksList'])->name('booksList');;

