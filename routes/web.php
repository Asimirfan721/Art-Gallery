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
// Home page: show all paintings
Route::get('/', [ListingController::class, 'index']);

// Search
Route::post('/search', [ListingController::class, 'search']);

// Create post (only for authenticated users)
Route::get('/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/gallery', [ListingController::class, 'store'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Edit, update, delete gallery items
Route::get('/gallery/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::put('/gallery/{listing}', [ListingController::class, 'update'])->middleware('auth');
Route::delete('/gallery/{listing}', [ListingController::class, 'destroy'])->name('gallery.destroy')->middleware('auth');

// Show single gallery item
Route::get('/gallery/{listing}', [ListingController::class, 'show']);

// Home page for authenticated users (if needed)
Route::get('/home', [HomeController::class, 'index']);

// User registration & authentication
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
