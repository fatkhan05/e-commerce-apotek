<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index(){

        return view('dashboard.index');
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
}
