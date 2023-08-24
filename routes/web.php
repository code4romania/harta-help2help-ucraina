<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => '{locale?}',
    'middleware' => [
        SetLocale::class,
        'throttle:web',
    ],
], function () {
    Route::get('/', HomeController::class)->name('home');

    Route::get('/services', [ServiceController::class, 'map'])->name('services');
    Route::get('/services/list', [ServiceController::class, 'list'])->name('services.list');

    Route::get('/ngo', [NgoController::class, 'index'])->name('ngos.index');
    Route::get('/ngo/{ngo:slug}', [NgoController::class, 'show'])->name('ngos.show');

    Route::get('/{page}', PageController::class)->name('page');
});
