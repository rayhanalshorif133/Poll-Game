<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;


Route::prefix('poll/')
    ->name('public.')
    ->group(function () {
        Route::get('/{id}', [PollController::class, 'poll_page'])->name('poll_page');
        Route::post('submit', [PollController::class, 'poll_submit'])->name('poll_submit');
    });
