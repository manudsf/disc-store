<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\DiscController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\HomeController;

Route::get('/search', [DiscController::class, 'search'])->name('discs.search');



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    
    Route::resource('genres', GenreController::class);
    Route::resource('artists', ArtistController::class);
    Route::resource('formats', FormatController::class);
    Route::resource('discs', DiscController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('sales', SaleController::class);

 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->middleware(['auth'])->name('dashboard');
    
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});


require __DIR__.'/auth.php';
