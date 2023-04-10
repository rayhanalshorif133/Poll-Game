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

        //
        Route::get('/player/search-by-phone/{phone}', 'playerSearchByPhone')->name('player-search-by-phone');
        Route::get('/player/search-by-phone-numbers/{phone}', 'playerSearchByPhoneNumbers')->name('player-search-by-phone-numbers');
    });
