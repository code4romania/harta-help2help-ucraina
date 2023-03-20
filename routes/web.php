<?php

declare(strict_types=1);

use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', [PageController::class, 'services'])->name('services');

Route::get('/ngos', [PageController::class, 'ngosPage'])->name('ngos');
Route::get('/ngos/{slug}', [PageController::class, 'ngoPage'])->name('ngo.index');

Route::get('/contact', function () {
    return view('contact');
});
