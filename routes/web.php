<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

   Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
*/


Route::get('/', [HomeController::class, 'welcome'])->name('welcome');


Route::get('/cmd', function () {
    // Artisan::call('view:clear');
    // Artisan::call('cache:clear');
    // Artisan::call('route:clear');
    // Artisan::call('config:clear');
    // Artisan::call('optimize:clear');
    // Artisan::call('config:cache');
    // Artisan::call('optimize');
    // Artisan::call('route:cache');
    // // one role back
    Artisan::call('migrate:rollback --step=1');
    Artisan::call('migrate');
    dd("ok");
    // Artisan::call('storage:link');
});


foreach (glob(base_path('routes/admin/*.php')) as $route) {
    require_once $route;
}
// foreach (glob(base_path('routes/public/*.php')) as $route) {
//     require_once $route;
// }
