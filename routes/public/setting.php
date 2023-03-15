<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;


Route::name("public.")
    ->group(function () {
        Route::get('/settings', [SettingController::class, 'settingPage'])->name('settingPage');
    });
