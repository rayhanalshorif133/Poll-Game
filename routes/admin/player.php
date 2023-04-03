<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;


Route::prefix('player/')
    ->middleware('auth')
    ->name('player.')
    ->group(function () {
        Route::get('/', [PlayerController::class, 'index'])->name('index');
        Route::get('{id}/view', [PlayerController::class, 'view'])->name('view');
    });
