<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Landing Page Route
Route::get('/', function () {
    return view('umum.landing');
});

// Login & Register Route
Route::get('/login', [UserController::class, 'loginInvoke']);
Route::post('/login', [UserController::class, 'login']);

// Admin Page Route
Route::get('/admin', [AdminController::class, 'invoke']);

// Tiket Antri Route
Route::get('/antri', [AntriController::class, 'invoke']);