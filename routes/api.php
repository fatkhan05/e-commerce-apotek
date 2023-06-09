<?php

use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\ObatController;
use App\Http\Controllers\API\OrderObatController;
use App\Http\Controllers\CheckOutController;
// use App\Http\Controllers\ObatController;
use App\Models\Transaksi;
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

Route::apiResource('obat2', ObatController::class);

Route::post('midtrans-callback', [CheckOutController::class, 'callback']);

Route::post('order-obat', [OrderObatController::class, 'order']);

Route::get('stock_obat', [ObatController::class, 'stock']);