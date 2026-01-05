<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminTherapistController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\RegisteredTherapistController;
use App\Http\Controllers\SessionUserController;
use App\Http\Controllers\TherapistDashboardController;
use App\Http\Controllers\TherapistUserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.user');

Route::get('/register-therapist', [RegisteredTherapistController::class, 'create'])->middleware(['auth', Role::class . ':admin']);
Route::post('/register-therapist', [RegisteredTherapistController::class, 'store'])->name('register.therapist')->middleware(['auth', Role::class . ':admin']);


Route::get('/login', [SessionUserController::class, 'create'])->name('login');
Route::post('/login', [SessionUserController::class, 'store']);

// Dashboards
Route::get('/dashboard/user', [UserDashboardController::class, 'index'])->middleware(['auth', Role::class . ':user']);
Route::get('/dashboard/therapist', [TherapistDashboardController::class, 'index'])->middleware(['auth', Role::class . ':therapist']);
Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])->middleware(['auth', Role::class . ':admin']);

// User Journal
Route::get('/journals', [JournalController::class, 'index'])->middleware(['auth', Role::class . ':user']);
Route::get('/journals/{journal}', [JournalController::class, 'show'])->middleware(['auth', Role::class . ':user']);

Route::patch('/journals/{journal}', [JournalController::class, 'update'])->middleware(['auth', Role::class . ':user']);
Route::delete('/journals/{journal}', [JournalController::class, 'destroy'])->name('journals.destroy')->middleware(['auth', Role::class . ':user']);

Route::post('/journals', [JournalController::class, 'store'])->middleware(['auth', Role::class . ':user']);

// Therapist routes
Route::get('/therapist/users/{user}/journals', [TherapistUserController::class, 'index'])->middleware(['auth', Role::class . ':therapist']);
Route::get('/therapist/users/{user}/journals/{journal}', [TherapistUserController::class, 'show'])->middleware(['auth', Role::class . ':therapist']);
Route::post('/therapist/users/{user}/journals/{journal}/comments', [TherapistUserController::class, 'store'])->middleware(['auth', Role::class . ':therapist']);

// Admin routes
Route::get('/therapist-assignments', [AdminTherapistController::class, 'index'])->middleware(['auth', Role::class . ':admin']);
Route::post('/therapist-assignments/{user}', [AdminTherapistController::class, 'store'])->middleware(['auth', Role::class . ':admin']);
