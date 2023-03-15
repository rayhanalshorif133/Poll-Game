<?php

use App\Http\Controllers\LeaderBoardController;
use Illuminate\Support\Facades\Route;


Route::name("public.")
    ->group(function () {
        Route::get('/leader-board', [LeaderBoardController::class, 'leaderBoardPage'])->name('leaderBoardPage');
    });
