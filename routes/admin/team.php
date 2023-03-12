<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;


Route::prefix('team/')
    ->middleware('auth')
    ->name('team.')
    ->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/create', [TeamController::class, 'create'])->name('create');
        Route::post('/store', [TeamController::class, 'store'])->name('store');
        Route::get('/{id}/view', [TeamController::class, 'view'])->name('view');
        Route::get('/{id}/edit', [TeamController::class, 'edit'])->name('edit');
        Route::post('/update', [TeamController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [TeamController::class, 'delete'])->name('delete');
    });
