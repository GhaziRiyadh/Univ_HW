<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('logout', [AuthController::class, 'login'])->name('login');
});

Route::get('test', function () {
    return view('learn');
});