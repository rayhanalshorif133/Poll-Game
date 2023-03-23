<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipateController;


Route::prefix('participate/')
    ->middleware('auth')
    ->name('participate.')
    ->group(function () {
        Route::get('/', [ParticipateController::class, 'index'])->name('index');
        Route::get('/create', [ParticipateController::class, 'create'])->name('create');
        Route::post('/store', [ParticipateController::class, 'store'])->name('store');
        Route::get('/{id}/view', [ParticipateController::class, 'view'])->name('view');
        Route::get('/{id}/edit', [ParticipateController::class, 'edit'])->name('edit');
        Route::post('/update', [ParticipateController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [ParticipateController::class, 'delete'])->name('delete');
    });
