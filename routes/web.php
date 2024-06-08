<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
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
    return view('welcome');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, config('app.available_locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('locale.switch');

Route::middleware(['auth', 'admin'])->group(function () {
    // Clients Routes
    Route::name('clients.')->group(function () {
        Route::get('/clients', [ClientController::class, 'index'])->name('index');
        Route::get('/clients/create', [ClientController::class, 'create'])->name('create');
        Route::post('/clients/create', [ClientController::class, 'store'])->name('store');
        Route::get('/clients/{client}/edit', [ClientController::class, 'showEdit'])->name('edit');
        Route::put('/clients/{client}', [ClientController::class, 'edit']);
        Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('destroy');
    });

    // Vehicles Routes
    Route::name('vehicles.')->group(function () {
        Route::get('/vehicles', [VehicleController::class, 'index'])->name('index');
        Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('create');
        Route::post('/vehicles/create', [VehicleController::class, 'store'])->name('store');
        Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'showEdit'])->name('edit');
        Route::put('/vehicles/{vehicle}', [VehicleController::class, 'edit']);
        Route::get('/vehicles/delete/{id}', [VehicleController::class, 'showDelete']);
        Route::delete('/vehicles/{vehicleId}', [VehicleController::class, 'destroy'])->name('destroy');
        Route::get('/vehicles/search', [VehicleController::class, 'search'])->name('search');
        Route::get('/vehicles/import', [VehicleController::class, 'showImportForm'])->name('vehicles.import.form');
        Route::post('/vehicles/import', [VehicleController::class, 'importVehicles'])->name('vehicles.import');
        Route::get('/vehicles/export', [VehicleController::class, 'exportVehicles'])->name('vehicles.export'); // New route for exporting as XML
    });

    // Home Route
    Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
    Route::post('/home/stats/pdf', [HomeController::class, 'generatePdf'])->name('admin.stats.pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require_once __DIR__ . '/auth.php';
