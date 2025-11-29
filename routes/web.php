<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionUserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionUserController::class, 'create'])->name('login');
Route::post('/login', [SessionUserController::class, 'store']);

// Dashboards
Route::get('/dashboard/user', [UserDashboardController::class, 'index'])->middleware('auth');

// User Journal
Route::get('/journals', [JournalController::class, 'index'])->middleware('auth');
Route::get('/journals/{journal}', [JournalController::class, 'show'])->middleware('auth');

Route::post('/journals', [JournalController::class, 'store'])->middleware('auth');
