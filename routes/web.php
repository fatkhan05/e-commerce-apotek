<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PaymentCallbackController;
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
    return view('auth/login');
});

Auth::routes();

Route::resource('home', HomeController::class);

// Obat 
Route::resource('Obat', ObatController::class);
// Route::get('/Obat', [ObatController::class, 'index']);
Route::get('/obat-detail/{id}', [ObatController::class, 'detail'])->name('obat-detail');
Route::get('/obat/create', [ObatController::class, 'create']);
Route::delete('obat/destroy', [ObatController::class, 'destroy']);

// Distributor
Route::resource('Distributor', DistributorController::class);
Route::get('/distributor/create', [DistributorController::class, 'create']);


// Transaksi
Route::resource('Transaksi', TransaksiController::class);

// Cart
Route::get('Cart', [OrderController::class, 'index']);
Route::resource('Cart/cart', CartController::class);
Route::post('/cart/add/{obat2}/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/update-cart/{cart}', [OrderController::class, 'update_cart'])->name('update_cart');
Route::delete('/cart/{cart}/{id}', [CartController::class, 'delete_cart'])->name('delete_cart');

// Order CheckOut
Route::resource('Order', CheckOutController::class);
Route::post('Order', [CheckOutController::class, 'index'])->name('Order');
Route::get('Order', [CheckOutController::class, 'checkout'])->name('check_out');
Route::get('/invoice/{id}', [CheckOutController::class, 'invoice'])->name('invoice');
Route::get('/order/{id}/pdf', [CheckOutController::class, 'invoicePdf'])->name('print.pdf');
Route::get('/dashboard/{id}/confirm', [DashboardController::class, 'confirm'])->name('orders.confirm');



// Login and Register
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.new');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('dashboard/index', [DashboardController::class, 'dashboard']);
Route::get('/dashboard/forms', [DashboardController::class, 'forms'])->name('forms');
Route::get('/dashboard/carts', [DashboardController::class, 'carts'])->name('carts');
Route::get('/dashboard/table', [DashboardController::class, 'table'])->name('table');
Route::get('/dashboard/samples/blankpage', [DashboardController::class, 'blank'])->name('blankpage');
Route::get('/dashboard/samples/error404', [DashboardController::class, 'notfound'])->name('404');
Route::get('/dashboard/samples/error500', [DashboardController::class, 'server'])->name('500');












