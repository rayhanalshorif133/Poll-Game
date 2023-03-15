<?php

use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;


Route::name("public.")
    ->group(function () {
        Route::get('/result', [ResultController::class, 'resultPage'])->name('resultPage');
    });
