<?php

declare(strict_types=1);

use App\Http\Controllers\PageController;
use App\Http\Middleware\LanguageManager;
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
    'prefix' => '{local?}',
    'middleware' => [
        LanguageManager::class,
        CacheResponse::class,
        'throttle:web',
    ],
], function () {
    Route::get('/', [PageController::class, 'home'])->name('home');

    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    Route::get('/services', [PageController::class, 'services'])->name('services')->middleware('throttle:services');
    Route::get('/services/list', [PageController::class, 'servicesList'])->name('services.list')->middleware('throttle:services');

    Route::get('/ngos', [PageController::class, 'ngosPage'])->name('ngos');
    Route::get('/ngos/{ngo:slug}', [PageController::class, 'ngoPage'])->name('ngo.index');
});
