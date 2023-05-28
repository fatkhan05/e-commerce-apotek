<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransaksiController;
// use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

Auth::routes();

Route::resource('Home', HomeController::class);

// Obat 
Route::resource('Obat', ObatController::class);
Route::get('/obat/create', [ObatController::class, 'create']);
Route::get('/obat', [ObatController::class, 'index']);
Route::get('obat/destroy', [ObatController::class, 'destroy']);

// Distributor
Route::resource('Distributor', DistributorController::class);
Route::get('/distributor/create', [DistributorController::class, 'create']);


// Transaksi
Route::resource('Transaksi', TransaksiController::class);

// Cart
Route::get('Cart', [OrderController::class, 'index']);
Route::resource('Cart/cart', CartController::class);
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [OrderController::class, 'update'])->name('update_cart');
Route::delete('/cart/{id}', [CartController::class, 'delete_cart'])->name('delete_cart');
Route::delete('remove-from-cart', [OrderController::class, 'remove'])->name('remove_from_cart');
// Route::get('remove-from-cart', [OrderController::class, 'remove'])->name('remove_from_cart');
// Route::post('store', [CartController::class, 'store']);

// Check Out
Route::resource('Order', CheckOutController::class);
Route::post('check-out', [CheckOutController::class, 'check_out'])->name('check_out');

// Login and Register
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/forms', [DashboardController::class, 'forms'])->name('forms');
Route::get('/dashboard/carts', [DashboardController::class, 'carts'])->name('carts');
Route::get('/dashboard/table', [DashboardController::class, 'table'])->name('table');
Route::get('/dashboard/samples/blankpage', [DashboardController::class, 'blank'])->name('blankpage');
Route::get('/dashboard/samples/error404', [DashboardController::class, 'notfound'])->name('404');
Route::get('/dashboard/samples/error500', [DashboardController::class, 'server'])->name('500');












