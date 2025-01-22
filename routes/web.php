<?php

use App\Http\Controllers\ProductionOrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/productionorders/orders', function () {
        return view('productionorders.orders');
    })->name('productionorders.orders');
    Route::get('/productionorders/createorder', [ProductionOrderController::class, 'index'])->name('productionorders.createorder');
    //Route [productionorders.store] not defined.
    Route::post('/productionorders/store', [ProductionOrderController::class, 'store'])->name('productionorders.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
