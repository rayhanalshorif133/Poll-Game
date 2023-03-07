<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsController;


Route::prefix('sports/')
    ->middleware('auth')
    ->name('sports.')
    ->group(function () {
        Route::get('/', [SportsController::class, 'index'])->name('index');
        Route::get('/create', [SportsController::class, 'create'])->name('create');
    });
