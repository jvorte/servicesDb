<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GarageController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('services', ServiceController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/garage', [GarageController::class, 'index'])->name('garage.index');
    Route::get('/garage/create', [GarageController::class, 'create'])->name('garage.create');
    Route::post('/garage', [GarageController::class, 'store'])->name('garage.store');
    Route::delete('/garage/{vehicle}', [GarageController::class, 'destroy'])->name('garage.destroy');


    Route::get('/garage/{vehicle}/services', [GarageController::class, 'services'])->name('garage.services');
    Route::get('/garage/{vehicle}/show', [GarageController::class, 'show'])->name('garage.show');
    Route::get('/garage/{vehicle}/services/{service}/edit', [GarageController::class, 'edit'])->name('garage.services.edit');
    Route::delete('/garage/{vehicle}/services/{service}', [GarageController::class, 'destroy'])->name('garage.services.destroy');
});


require __DIR__ . '/auth.php';
