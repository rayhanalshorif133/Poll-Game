<?php

use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;


Route::name("public.")
    ->group(function () {
        Route::get('/result/{id}', [ResultController::class, 'resultPage'])->name('resultPage');
        Route::get('/result/{id}/score', [ResultController::class, 'resultPageScore'])->name('resultPageScore');
    });
