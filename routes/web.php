<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('purchase', \App\Http\Controllers\PurchaseController::class);
    Route::resource('sale', \App\Http\Controllers\SaleController::class);
    Route::resource('price', \App\Http\Controllers\PriceController::class);
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::get('/report', [\App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
    Route::get('/report/{month?}', [\App\Http\Controllers\ReportController::class, 'show'])->name('report.show');
});

require __DIR__.'/auth.php';

