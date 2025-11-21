<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionUserController::class, 'create']);
Route::post('/login', [SessionUserController::class, 'store']);

Route::get('/dashboard', [JournalController::class, 'index'])->middleware('auth');
