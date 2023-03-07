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
        Route::post('/store', [SportsController::class, 'store'])->name('store');
        Route::get('/{id}/view', [SportsController::class, 'viewAndEdit'])->name('view');
        Route::get('/{id}/edit', [SportsController::class, 'viewAndEdit'])->name('view');
        Route::post('/update', [SportsController::class, 'update'])->name('update');
    });
