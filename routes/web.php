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
	// dashboard
	Route::get('/user/dashboard', [ViewController::class, 'dashboard'])->name('user.dashboard');
	// new task (get)
	Route::get('/user/newtask', [TaskController::class, 'create']);
	// all tasks (get)
	Route::get('/user/tasks', [TaskController::class, 'all']);
	// edit task
	Route::get('/user/{id}/edit', [TaskController::class, 'edit']);
	// new task (post)
	Route::post('/user/newtask', [TaskController::class, 'store']);
	// edit task (post)
	Route::post('/user/{id}/edit', [TaskController::class, 'update']);
	// delete task (post)
	Route::post('/user/{id}/delete', [TaskController::class, 'destroy']);
	// logout
	Route::post('/user/logout', [UserController::class, 'logout'])->name('logout');
});