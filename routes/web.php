<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GarageController;
use Illuminate\Support\Facades\Route;

use App\Models\Vehicle;

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

Route::get('/vehicles/{vehicle}/services/export-pdf', [App\Http\Controllers\ServiceController::class, 'exportPdf'])
    ->name('services.export.pdf');




Route::get('/dashboard', function () {
    $vehicles = Vehicle::with('services') // φορτώνει όλα τα services
                        ->where('user_id', auth()->id())
                        ->get();

    // Στατιστικά
    $stats = [
        'totalVehicles' => $vehicles->count(),
        'totalServices' => $vehicles->sum(fn($v) => $v->services->count()),
        'cars' => $vehicles->where('type','car')->count(),
        'motos' => $vehicles->where('type','moto')->count(),
        'boats' => $vehicles->where('type','boat')->count(),
    ];

    return view('dashboard', compact('vehicles','stats'));
})->middleware(['auth','verified'])->name('dashboard');


        // Vehicle selection
    Route::get('/garage', [GarageController::class, 'index'])->name('garage.index');

    // Services for a specific vehicle
    Route::get('/vehicles/{vehicle}/services', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/vehicles/{vehicle}/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/vehicles/{vehicle}/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/vehicles/{vehicle}/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/vehicles/{vehicle}/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/vehicles/{vehicle}/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

});


require __DIR__ . '/auth.php';
