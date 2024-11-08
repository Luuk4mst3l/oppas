<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//Manage
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
//Index
Route::get('/', [ListingController::class, 'index']);
//create
Route::get('/listings/create', [ListingController::class, 'create']);
//store
Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
//edit
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
//update
Route::put('/listings/{listing}', [ListingController::class, 'update']);
//destroy
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);
//show
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Respond
//Route::get('/listings/{listing}/respond', [ListingController::class, 'respond'])->name('listings.respond');
//Show Register create

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//index
//Route::get('/admin', [ListingController::class, 'indexAdmin'])->middleware('auth');
//delete
//Route::delete('/admin/{user}', [UserController::class, 'destroy'])->middleware('auth');

