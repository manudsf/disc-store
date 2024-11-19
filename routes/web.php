<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\GenreController;

Route::resource('genres', GenreController::class);

use App\Http\Controllers\ArtistController;

Route::resource('artists', ArtistController::class);

use App\Http\Controllers\FormatController;

Route::resource('formats', FormatController::class);

use App\Http\Controllers\DiscController;

Route::resource('discs', DiscController::class);

use App\Http\Controllers\CustomerController;

Route::resource('customers', CustomerController::class);


use App\Http\Controllers\SaleController;

Route::resource('sales', SaleController::class);

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
