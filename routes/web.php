<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonPartController;
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
        Route::get('/', [ConceptController::class, 'concepts'])->name('index');
        Route::get('/${id}', [ConceptController::class, 'show'])->name('show');
    });
    Route::prefix('languages')->name('languages.')->group(function () {
        Route::get('/', [LanguageController::class, 'languages'])->name('index');
        Route::get('/${id}', [LanguageController::class, 'show'])->name('show');
    });
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'categories'])->name('index');
        Route::get('/${id}', [CategoryController::class, 'show'])->name('show');
    });
    Route::prefix('lessons')->name('lessons.')->group(function () {
        Route::get('/', [LessonController::class, 'lessons'])->name('index');
        Route::get('/${id}', [LessonController::class, 'show'])->name('show');
    });
    Route::prefix('lessons-parts')->name('lessons-parts.')->group(function () {
        Route::get('/', [LessonPartController::class, 'lessons_parts'])->name('index');
        Route::get('/${id}', [LessonPartController::class, 'show'])->name('show');
    });
});
