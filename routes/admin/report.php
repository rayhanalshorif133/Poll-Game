<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::middleware('auth')
    ->controller(ReportController::class)
    ->name('report.')
    ->prefix('report/')
    ->group(function () {
        Route::get('/player', 'player')->name('player');
    });
