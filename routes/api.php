<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/palm_oil_buy_price', [\App\Http\Controllers\PriceController::class, 'getBuyPrice'])->name('getBuyPrice');
Route::get('/palm_oil_sell_price', [\App\Http\Controllers\PriceController::class, 'getSellPrice'])->name('getSellPrice');
