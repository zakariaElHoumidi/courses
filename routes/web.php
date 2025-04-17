<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);


Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::prefix('concepts')->name('concepts.')->group(function () {
        Route::get('/', [HomeController::class, 'concepts'])->name('index');
    });
    Route::prefix('languages')->name('languages.')->group(function () {
        Route::get('/', [HomeController::class, 'languages'])->name('index');
    });
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [HomeController::class, 'categories'])->name('index');
    });
});
