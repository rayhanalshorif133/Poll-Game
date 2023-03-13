<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome'])->name('public.welcome');

Route::name("public.")
    ->group(function () {
        Route::get('/home', [HomeController::class, 'home'])->name('home');
    });
