<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware('auth')
    ->get('/user/dashboard', [HomeController::class, 'userDashboard'])
    ->name('user.dashboard');
