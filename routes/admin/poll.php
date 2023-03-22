<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;



Route::prefix('admin/poll/')
    ->middleware('auth')
    ->name('poll.')
    ->controller(PollController::class)
    ->group(function () {
        Route::get('/{match_id?}/{day?}', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('{id}/view', 'viewAndEdit')->name('view');
        Route::get('/{id}/edit', 'viewAndEdit')->name('edit');
        Route::delete('/image/{id}/{item}/delete', 'poll_image_delete')->name('poll_image_delete');
        Route::post('/update', 'update')->name('update');
        // Route::delete('/{id}/delete', [PollController::class, 'delete'])->name('delete');


        // Search
        Route::post('/search', [PollController::class, 'search'])->name('search');
    });
