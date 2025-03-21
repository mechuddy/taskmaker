<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
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

/**
 * Route Definitions
*/

// Non Auth Routes
Route::get('/', [ViewController::class, 'home']);
Route::get('/home', [ViewController::class, 'home']);
Route::get('/user/register', [ViewController::class, 'register'])->name('user.register');
Route::get('/user/login', [ViewController::class, 'login'])->name('user.login');
Route::post('/user/register', [UserController::class, 'store']);
Route::post('/user/login', [UserController::class, 'authenticate']);

// Auth Routes
Route::middleware(['auth'])->group(function () {
	// dashboard
	Route::get('/user/dashboard', [ViewController::class, 'dashboard'])->name('user.dashboard');
	// logout
	Route::post('/user/logout', [UserController::class, 'logout'])->name('logout');
});