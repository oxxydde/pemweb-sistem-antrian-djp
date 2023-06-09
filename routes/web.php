<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntriController;
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

// Login, Logout, Register Route
Route::get('/login', UserController::class)->name('login.login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::get('/register',[UserController::class, 'invokeRegister'])->name('register.page');
Route::post('/register',[UserController::class, 'register'])->name('register.submit');
Route::get('/logout',[UserController::class, 'logout'])->name('admin.logout');

// Admin Page Route
Route::get('/admin', AdminController::class)->name('admin.dashboard');
Route::get('/update_antri/{id}/{newStatus}', [AdminController::class, 'update'])->name('admin.update');
Route::get('/reset_antri', [AdminController::class, 'resetAntri'])->name('admin.resetAntri');

// Tiket Antri Route
Route::get('/antri', AntriController::class)->name('tiket.formAntri');
Route::post('/antri', [AntriController::class, 'createTiketAntri'])->name('tiket.submit');

// Tiket Anda Route
Route::get('/tiket_anda', [AntriController::class, 'showTiketAnda'])->name('tiket.showTiket');

