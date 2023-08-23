<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Spatie\ResponseCache\Middlewares\CacheResponse;

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
        CacheResponse::class,
        'throttle:web',
    ],
], function () {
    Route::get('/', HomeController::class)->name('home');

    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    Route::get('/services', [PageController::class, 'services'])->name('services')->middleware('throttle:services');
    Route::get('/services/list', [PageController::class, 'servicesList'])->name('services.list')->middleware('throttle:services');

    Route::get('/ngo', [NgoController::class, 'index'])->name('ngos.index');
    Route::get('/ngo/{ngo:slug}', [NgoController::class, 'show'])->name('ngos.show');
});
