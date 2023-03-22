<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;


Route::name("public.history.")
    ->group(function () {
        Route::get('/history', [HistoryController::class, 'index'])->name('index');
    });
