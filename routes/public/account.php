<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;


Route::name("public.account.")
    ->prefix('account/')
    ->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('index');
    });
