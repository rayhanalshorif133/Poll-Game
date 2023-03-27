<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;


Route::prefix('subscription/')
    ->middleware('auth')
    ->name('subscription.')
    ->group(function () {
        Route::get('/', [SubscriptionController::class, 'index'])->name('index');
        Route::get('/{match_id}/view', [SubscriptionController::class, 'view'])->name('view');
        Route::delete('/{id}/delete', [SubscriptionController::class, 'delete'])->name('delete');
    });
