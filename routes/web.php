<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupportController;
use App\Models\Vehicle;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de'])) {
        abort(400);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('lang.switch');

// Welcome page
Route::get('/', function () {
    return view('welcome');
});
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/support', 'support')->name('support');
Route::post('/support-submit', [SupportController::class, 'submit'])->name('support.submit');


// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {

    /**
     * Dashboard
     */
    Route::get('/dashboard', function () {
        $vehicles = auth()->user()->vehicles()->with('services')->get();

        $stats = [
            'totalVehicles' => $vehicles->count(),
            'totalServices' => $vehicles->sum(fn($v) => $v->services->count()),
            'cars' => $vehicles->where('type', 'car')->count(),
            'motos' => $vehicles->where('type', 'moto')->count(),
            'boats' => $vehicles->where('type', 'boat')->count(),
        ];

        return view('dashboard', compact('vehicles', 'stats'));
    })->name('dashboard');

    /**
     * Profile
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * Garage (Vehicles) - full resource
     */
Route::middleware(['auth'])->group(function () {

    // Garage routes
    Route::get('/garage', [GarageController::class, 'index'])->name('garage.index');
    Route::get('/garage/create', [GarageController::class, 'create'])->name('garage.create');
    Route::post('/garage', [GarageController::class, 'store'])->name('garage.store');

    // Όλα τα routes που αφορούν ένα συγκεκριμένο όχημα
    Route::prefix('garage/{vehicle}')->group(function () {
        Route::get('edit', [GarageController::class, 'edit'])->name('garage.edit');
        Route::put('', [GarageController::class, 'update'])->name('garage.update');
        Route::delete('', [GarageController::class, 'destroy'])->name('garage.destroy');
        Route::get('show', [GarageController::class, 'show'])->name('garage.show');
    });

});

    /**
     * Vehicle Services
     */
    Route::patch('/services/{service}/complete', [ServiceController::class, 'complete'])->name('services.complete');

    Route::prefix('vehicles/{vehicle}')->group(function () {
        Route::get('services', [ServiceController::class, 'show'])->name('services.show');
        Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

        // Export PDF for vehicle services
        Route::get('services/export-pdf', [ServiceController::class, 'exportPdf'])->name('services.export.pdf');
    });

});
