<?php

namespace App\Http\Controllers;

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

        return view('dashboard.table');
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
