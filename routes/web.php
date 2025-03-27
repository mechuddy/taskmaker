<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;

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
	/* USER RELATED */
	Route::get('/user/dashboard', [ViewController::class, 'dashboard'])->name('user.dashboard');
	Route::get('/user/accountsettings', [ViewController::class, 'accountsettings'])->name('user.accountsettings');
	Route::get('/user/changepassword', [UserController::class, 'changePassword'])->name('user.changepassword');
	Route::post('/user/{id}/changepassword', [UserController::class, 'update']);
	Route::post('/user/logout', [UserController::class, 'logout'])->name('logout');
	/* TASK RELATED */
	Route::get('/user/newtask', [TaskController::class, 'create']);
	Route::get('/user/tasks', [TaskController::class, 'all']);
	Route::get('/user/{id}/edit', [TaskController::class, 'edit']);
	Route::post('/user/newtask', [TaskController::class, 'store']);
	Route::post('/user/{id}/edit', [TaskController::class, 'update']);
	Route::post('/user/{id}/delete', [TaskController::class, 'destroy']);
});