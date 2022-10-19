<?php

use App\Http\Controllers\Auth\{RegistrationController, AuthenticatedController, LogoutController};
use App\Http\Controllers\BukuController;
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

Route::controller(BukuController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/buku', 'index')->name('buku.index');
    Route::post('/buku', 'store')->name('buku.store');
    Route::get('/buku/{buku}', 'show')->name('buku.show');
    Route::post('/buku/{buku}/update', 'update')->name('buku.update');
    Route::delete('/buku/{buku}', 'destroy')->name('buku.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegistrationController::class, 'index'])->name('register.index');
    Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthenticatedController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthenticatedController::class, 'authenticate'])->name('login.store');
});
