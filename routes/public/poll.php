<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;


Route::prefix('poll/')
    ->name('public.poll-page.')
    ->group(function () {
        Route::get('/{id}', [PollController::class, 'poll_page'])->name('poll_page');
    });
