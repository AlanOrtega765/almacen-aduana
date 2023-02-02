<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RetentionSlipController;
use App\Http\Controllers\ContrabandController;
use App\Http\Controllers\AbandonmentsController;
use App\Http\Controllers\SuspensionDispatchController;
use App\Http\Controllers\MerchandiseDeliveryRequestController;
use App\Http\Controllers\VehicleDeliveryRequestController;
use App\Http\Controllers\LagsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Inicio
Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Boletas Retención
Route::get('/boletas-retencion', [RetentionSlipController::class, 'index'])->middleware(['auth', 'verified'])->name('boletas.index');
Route::get('/boletas-retencion/pdf/{id}', [RetentionSlipController::class, 'printPDF'])->middleware(['auth', 'verified'])->name('pdf');
Route::post('/boletas-retencion/store', [RetentionSlipController::class, 'store'])->middleware(['auth', 'verified']);

// Contrabandos
Route::get('/contrabandos', [ContrabandController::class, 'index'])->middleware(['auth', 'verified'])->name('contrabandos.index');

// Abandonos
Route::get('/abandonos', [AbandonmentsController::class, 'index'])->middleware(['auth', 'verified'])->name('abandonos.index');

// Suspension Despacho
Route::get('/suspension-despacho', [SuspensionDispatchController::class, 'index'])->middleware(['auth', 'verified'])->name('suspension.index');

// Solicitud Entrega Mercancía
Route::get('/solicitud-entrega-mercancia', [MerchandiseDeliveryRequestController::class, 'index'])->middleware(['auth', 'verified'])->name('mercancias.index');

// Solicitud Entrega Vehículo
Route::get('/solicitud-entrega-vehiculo', [VehicleDeliveryRequestController::class, 'index'])->middleware(['auth', 'verified'])->name('vehiculos.index');

// Rezagos
Route::get('/rezagos', [LagsController::class, 'index'])->middleware(['auth', 'verified'])->name('rezagos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/retentionpdf', function() {

    return inertia('Documents/Retentionpdf');
});

require __DIR__ . '/auth.php';
