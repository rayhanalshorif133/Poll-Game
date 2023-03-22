<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsController;


Route::prefix('sports-page/')
    ->name('public.sports-page.')
    ->group(function () {
        Route::get('/{id}', [SportsController::class, 'sports_page'])->name('index');
    });
