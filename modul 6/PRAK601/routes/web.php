<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfileController::class, 'index']);
Route::get('/profil', [ProfileController::class, 'profile'])->name('profile');
Route::get('/detail/{slug}', [ProfileController::class, 'activity'])->name('activities.show');
