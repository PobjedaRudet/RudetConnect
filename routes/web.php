<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocxController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionOrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;








Route::get('/', function () {
    return view('welcome');
});
Route::get('/orders/{id}/{token}', [ProductionOrderController::class, 'edit'])->name('orders.edit');
Route::get('/download-document/{orderId}/{userId}', [DocumentController::class, 'downloadDocument']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/productionorders/createorder', [ProductionOrderController::class, 'create'])->name('productionorders.createorder');
    Route::get('/productionorders/orders', [ProductionOrderController::class, 'orders'])->name('productionorders.orders');
    Route::get('/productionorders/test', [ProductionOrderController::class, 'test'])->name('productionorders.test');

    // Route to display the page with the button
    Route::get('/send-email', [EmailController::class, 'showEmailPage']);

    // Route to handle the button click and send the email
    Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
    Route::get('/productionorders/{id}', [ProductionOrderController::class, 'show'])->name('productionorders.show');

    Route::get('/update-order-status/{token}', [ProductionOrderController::class, 'updateStatus'])->name('update.order.status');

    Route::get('/productionorders/{id}/edit', [ProductionOrderController::class, 'edit'])->name('productionorders.edit');
    //Route [productionorders.store] not defined.
    // Route::post('/productionorders/store', [ProductionOrderController::class, 'store'])->name('productionorders.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/productionorders/{id}', [ProductionOrderController::class, 'destroy'])->name('productionorders.destroy');
    //create route for uploadorder.blade.php file
    Route::get('/productionorders/uploadorder', [ProductionOrderController::class, 'uploadorder'])->name('productionorders.uploadorder');
});
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');
Route::get('/upload', [FileUploadController::class, 'index'])->name('upload');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/productslist', [ProductController::class, 'numeredlist']);
Route::get('/productslistBihnel', [ProductController::class, 'numeredlistBihnel']);
Route::get('/getCeOznaka', [ProductController::class, 'getCeOznaka']);
Route::get('/getCeOznakaBihnel', [ProductController::class, 'getCeOznakaBihnel']);

Route::post('/productionorders', [ProductionOrderController::class, 'store'])->name('productionorders.store');
// getOrderNumber
Route::get('/getOrderNumber', [ProductionOrderController::class, 'getOrderNumber']);
require __DIR__ . '/auth.php';
