<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;


Route::middleware('auth')
    ->controller(ReportController::class)
    ->name('report.')
    ->prefix('report/')
    ->group(function () {
        Route::prefix('player/')
            ->group(function () {
                Route::get('/', 'player')->name('player');
                Route::get('/search-by-phone/{id}', 'playerSearchByPhone')->name('player-search-by-phone');
                Route::get('/search-by-phone-numbers/{phone}', 'playerSearchByPhoneNumbers')->name('player-search-by-phone-numbers');
                Route::get('/search-by-match-title/{match_title}', 'playerSearchByMatchTitle')->name('player-search-by-match-title');
                Route::get('/search/point/{player_id}/{match_id}', 'getPoint')->name('get-point');
            });
        Route::prefix('tournament/')
            ->name('tournament.')
            ->group(function () {
                Route::get('/match', 'match')->name('match');
            });
    });
