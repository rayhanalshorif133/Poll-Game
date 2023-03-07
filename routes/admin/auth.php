<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AuthController::class, 'loginView'])->name('loginView');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });
Route::middleware('auth')
    ->get('admin.logout', [AuthController::class, 'logout'])->name('admin.logout');

// Handle redirection to login page
Route::get('/login', function () {
    return redirect()->route('admin.loginView');
})->name('login');
