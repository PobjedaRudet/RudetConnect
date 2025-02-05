<?php

use App\Http\Controllers\DocxController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordController;
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
    //create route for uploadorder.blade.php file
    Route::get('/productionorders/uploadorder', [ProductionOrderController::class, 'uploadorder'])->name('productionorders.uploadorder');
});
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');
Route::get('/upload', [FileUploadController::class, 'index'])->name('upload');
Route::get('view-docx/{filename}', [DocxController::class, 'viewDocx']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/productslist', [ProductController::class, 'numeredlist']);
Route::get('/productslistBihnel', [ProductController::class, 'numeredlistBihnel']);
Route::get('/getCeOznaka', [ProductController::class, 'getCeOznaka']);
Route::get('/getCeOznakaBihnel', [ProductController::class, 'getCeOznakaBihnel']);

Route::post('/productionorders', [ProductionOrderController::class, 'store'])->name('productionorders.store');
// getOrderNumber
Route::get('/getOrderNumber', [ProductionOrderController::class, 'getOrderNumber']);
require __DIR__.'/auth.php';
