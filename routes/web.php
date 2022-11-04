<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebAuthController::class, 'loginIndex'])->name('login');
Route::post('login', [WebAuthController::class, 'login'])->name('login');

Route::get('register', [WebAuthController::class, 'registerIndex'])->name('register');
Route::post('register', [WebAuthController::class, 'register'])->name('register');

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
