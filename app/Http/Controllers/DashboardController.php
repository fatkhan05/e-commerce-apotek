<?php

namespace App\Http\Controllers;

use App\Models\Obat2;
use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index(){

        return view('dashboard.index');
    }

    public function dashboard() {

        $obat = Obat2::paginate(5);
        $order = Order::orderBy('id', 'desc')->paginate(6);
        $transaksi = Transaksi::all();
        $totalData = DB::table('obat2')->count();
        $totalUser = DB::table('users')->count();
        $totalOrder = DB::table('orders')->count();
        $totalDistributor = DB::table('distributor')->count();
        $totalAmount = number_format(DB::table('orders')->sum('total_price'),0,',','.');
        return view('dashboard.dashboard', compact('obat', 'order', 'transaksi', 'totalData', 'totalDistributor', 'totalUser', 'totalOrder', 'totalAmount'));
    }

    public function forms() {

        return view('dashboard.forms');
    }

    public function carts() {
        
        return view('dashboard.carts');
    }

    public function table() {

        $transaksi = Transaksi::all();
        return view('dashboard.table', compact('transaksi'));
    }

    public function blank() {

        return view('dashboard.samples.blankpage');
    }

    public function notfound() {

        return view('dashboard.samples.error404');
    }
    public function server() {

        return view('dashboard.samples.error500');
    }

    public function confirm($id) 
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'Unpaid') {
            $order->status = 'Paid';
            $order->save();

            return redirect()->back()->with('success', 'Pesanan telah dikonfirmasi dan sudah terbayar.');
        }

        return redirect()->back()->with('error', 'Pesanan tidak dapat dikonfirmasi.');
    }

}
