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
Route::post('/contrabandos/store', [ContrabandController::class, 'store'])->middleware(['auth', 'verified']);

// Abandonos
Route::get('/abandonos', [AbandonmentsController::class, 'index'])->middleware(['auth', 'verified'])->name('abandonos.index');
Route::post('/abandonos/store', [AbandonmentsController::class, 'store'])->middleware(['auth', 'verified']);

// Suspension Despacho
Route::get('/suspension-despacho', [SuspensionDispatchController::class, 'index'])->middleware(['auth', 'verified'])->name('suspension.index');
Route::post('/suspension-despacho/store', [SuspensionDispatchController::class, 'store'])->middleware(['auth', 'verified']);

// Solicitud Entrega Mercancía
Route::get('/solicitud-entrega-mercancia', [MerchandiseDeliveryRequestController::class, 'index'])->middleware(['auth', 'verified'])->name('mercancias.index');
Route::post('/solicitud-entrega-mercancia/store', [MerchandiseDeliveryRequestController::class, 'store'])->middleware(['auth', 'verified']);

// Solicitud Entrega Vehículo
Route::get('/solicitud-entrega-vehiculo', [VehicleDeliveryRequestController::class, 'index'])->middleware(['auth', 'verified'])->name('vehiculos.index');
Route::post('/solicitud-entrega-vehiculo/store', [VehicleDeliveryRequestController::class, 'store'])->middleware(['auth', 'verified']);

// Rezagos
Route::get('/rezagos', [LagsController::class, 'index'])->middleware(['auth', 'verified'])->name('rezagos.index');
Route::post('/rezagos/store', [LagsController::class, 'store'])->middleware(['auth', 'verified']);

//Cuentas crear eliminar usuarios
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/retentionpdf', function() {

    return inertia('Documents/Retentionpdf');
});

Route::get('/contrabandpdf', function() {

    return inertia('Documents/contrabandpdf');
});

require __DIR__ . '/auth.php';
