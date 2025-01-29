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


//All Listings for the gallery
Route::get('/',[ListingController::class, 'index']);

//Search for Listings in the gallery
Route::post('/search', [ListingController::class, 'search']);

// Show the create form 
Route::get('/create',[ListingController::class, 'create']);

//Store the gallery from
Route::post('/gallery', [ListingController::class, 'store']);

//Show the edit from
Route::get('/gallery/{listing}/edit', [ListingController::class, 'edit']);

//Update the edit from
Route::put('/gallery/{listing}', [ListingController::class, 'update']);

// Delete a gallery listing from the database
Route::delete('/gallery/{listing}', [ListingController::class, 'destroy']);

//Show individual listing
Route::get('/gallery/{listing}',[ListingController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']);


// User Routes 


//put new users
Route::post('/users', [UserController::class, 'store']);


//Show Login form
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

