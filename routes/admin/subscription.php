<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;


Route::prefix('subscription/')
    ->middleware('auth')
    ->name('subscription.')
    ->group(function () {
        Route::get('/', [SubscriptionController::class, 'index'])->name('index');
        Route::get('/create', [SubscriptionController::class, 'create'])->name('create');
        Route::post('/store', [SubscriptionController::class, 'store'])->name('store');
        Route::get('/{id}/view', [SubscriptionController::class, 'view'])->name('view');
        Route::get('/{id}/edit', [SubscriptionController::class, 'edit'])->name('edit');
        Route::post('/update', [SubscriptionController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [SubscriptionController::class, 'delete'])->name('delete');
    });
