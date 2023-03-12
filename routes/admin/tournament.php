<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;


Route::prefix('tournament/')
    ->middleware('auth')
    ->name('tournament.')
    ->group(function () {
        Route::get('/', [TournamentController::class, 'index'])->name('index');
        Route::get('/create', [TournamentController::class, 'create'])->name('create');
        Route::post('/store', [TournamentController::class, 'store'])->name('store');
        Route::get('/{id}/view', [TournamentController::class, 'view'])->name('view');
        Route::get('/{id}/edit', [TournamentController::class, 'edit'])->name('edit');
        Route::post('/update', [TournamentController::class, 'update'])->name('update');
        Route::get('/{id}/delete', [TournamentController::class, 'delete'])->name('delete');
    });
