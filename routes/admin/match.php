<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchController;


Route::prefix('match/')
    ->middleware('auth')
    ->name('match.')
    ->group(function () {
        Route::get('/', [MatchController::class, 'index'])->name('index');
        Route::get('/create', [MatchController::class, 'create'])->name('create');
        Route::post('/store', [MatchController::class, 'store'])->name('store');
        Route::get('/{id}/view', [MatchController::class, 'view'])->name('view');
        Route::get('/{id}/edit', [MatchController::class, 'edit'])->name('edit');
        Route::post('/update', [MatchController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [MatchController::class, 'delete'])->name('delete');
    });
