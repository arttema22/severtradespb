<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

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

Route::get('/', HomeController::class)->name('home');

Route::controller(CategoryController::class)
    ->name('categories.')
    ->prefix('categories')->group(function () {
        Route::get('/{slug?}', 'index')->name('index');
    });

Route::controller(TagController::class)
    ->name('tags.')
    ->prefix('tags')->group(function () {
        Route::get('/{slug?}', 'index')->name('index');
    });

Route::controller(ProductController::class)
    ->name('products.')
    ->prefix('products')->group(function () {
        Route::get('/{slug?}', 'index')->name('index');
    });

// Route::get('/', function () {
//     return view('welcome');
// });
