<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use App\Models\Meal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', [WebAuthController::class, 'loginIndex'])->name('login');
Route::post('/', [WebAuthController::class, 'login'])->name('login');

Route::get('register', [WebAuthController::class, 'registerIndex'])->name('register');
Route::post('register', [WebAuthController::class, 'register'])->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', function () {
        return view('web.index', [
            'meals' => Meal::all(),
            'user' => Auth::user(),
        ]);
    })->name('home');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('meal/store', [])->name('new-meal');

    Route::get('update/{user}', [WebAuthController::class, 'registerIndex'])->name('update');
    Route::post('update/{user}', [WebAuthController::class, 'register'])->name('update');

    Route::get('logout', [WebAuthController::class, 'logout'])->name('logout');
});

Route::get('test', function () {
    return view('learn');
});
