<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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


Route::get('/',[ListingController::class, 'index']);
Route::post('/search', [ListingController::class, 'search']);
Route::get('/create',[ListingController::class, 'create']);
Route::post('/gallery', [ListingController::class, 'store']);

Route::delete('/gallery/{id}', [ListingController::class, 'destroy'])->name('gallery.destroy');
Route::get('/gallery/{listing}/edit', [ListingController::class, 'edit']);
Route::put('/gallery/{listing}', [ListingController::class, 'update']);
Route::delete('/gallery/{listing}', [ListingController::class, 'destroy']);

Route::get('/gallery/{listing}',[ListingController::class, 'show']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

