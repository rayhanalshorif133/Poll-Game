<?php

use App\Http\Controllers\StartedController;
use Illuminate\Support\Facades\Route;


Route::name("public.")
    ->group(function () {
        Route::get('/landing-page-one', [StartedController::class, 'landingPageOne'])->name('landing-page-one');
        Route::get('/landing-page-two', [StartedController::class, 'landingPageTwo'])->name('landing-page-two');
        Route::get('/landing-page-three', [StartedController::class, 'landingPageFinal'])->name('landing-page-final');
    });
