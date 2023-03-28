<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;


Route::prefix('subscription/')
    ->middleware('auth')
    ->name('subscription.')
    ->group(function () {
        Route::get('/', [SubscriptionController::class, 'index'])->name('index');
        Route::get('/{match_id}/view', [SubscriptionController::class, 'view'])->name('view');
        Route::get('/{match_id}/details', [SubscriptionController::class, 'details'])->name('details');
        Route::get('/{match_id}/bar-chart-details', [SubscriptionController::class, 'barChartDetails'])->name('bar-chart-details');
        Route::delete('/{id}/delete', [SubscriptionController::class, 'delete'])->name('delete');
    });
