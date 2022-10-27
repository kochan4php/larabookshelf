<?php

use App\Http\Controllers\Auth\{
  RegistrationController,
  AuthenticatedController,
  LogoutController
};
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/buku');

Route::middleware(['auth', 'verified'])->group(function () {
  Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

  Route::controller(BukuController::class)->group(function () {
    Route::get('/buku', 'index')->name('buku.index');
    Route::post('/buku', 'store')->name('buku.store');
    Route::get('/buku/{buku}', 'show')->name('buku.show');
    Route::post('/buku/{buku}/update', 'update')->name('buku.update');
    Route::delete('/buku/{buku}', 'destroy')->name('buku.destroy');
  });
});

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegistrationController::class, 'index'])
    ->name('register.index');
  Route::post('/register', [RegistrationController::class, 'store'])
    ->name('register.store');
  Route::get('/login', [AuthenticatedController::class, 'index'])
    ->name('login');
  Route::post('/login', [AuthenticatedController::class, 'authenticate'])
    ->name('login.authenticate');
});
