<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use App\Http\Controllers\Web\MealController;
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
        $props = [
            'meals' => Meal::all(),
            'user' => Auth::user(),
        ];
        return view('web.index', $props);
    })->name('home');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('meal/{meal?}', [MealController::class, 'index'])->name('meal');
    Route::post('meal/{meal?}', [MealController::class, 'store'])->name('meal');
    Route::get('meal/destory/{meal}', [MealController::class, 'destroy'])->name('meal.destroy');

    Route::get('update/{user}', [WebAuthController::class, 'registerIndex'])->name('update');
    Route::post('update/{user}', [WebAuthController::class, 'register'])->name('update');

    // Route::post('logout', [WebAuthController::class, 'logout'])->name('logout');
});

Route::get('test', function () {
    return view('learn');
});
