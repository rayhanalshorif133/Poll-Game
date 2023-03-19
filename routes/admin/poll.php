<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;



Route::prefix('admin/poll/')
    ->middleware('auth')
    ->name('poll.')
    ->group(function () {
        Route::get('/', [PollController::class, 'index'])->name('index');
        Route::get('/create', [PollController::class, 'create'])->name('create');
        Route::post('/store', [PollController::class, 'store'])->name('store');
        Route::get('{id}/view', [PollController::class, 'viewAndEdit'])->name('view');
        // Route::get('/{id}/edit', [PollController::class, 'viewAndEdit'])->name('edit');
        // Route::post('/update', [PollController::class, 'update'])->name('update');
        // Route::delete('/{id}/delete', [PollController::class, 'delete'])->name('delete');
    });
