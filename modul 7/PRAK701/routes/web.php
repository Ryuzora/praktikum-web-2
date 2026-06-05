<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::middleware('logged.in')->group(function () {
    Route::get('/', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/form', [BukuController::class, 'create'])->name('buku.create');
    Route::get('/form/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::post('/form', [BukuController::class, 'store'])->name('buku.store');
    Route::put('/form/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
